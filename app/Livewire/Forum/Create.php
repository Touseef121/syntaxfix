<?php

namespace App\Livewire\Forum;

use App\Models\Forum;
use Livewire\Component;
use App\Models\Category;
use App\Models\ForumAttachment;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $forum = [];
    public $uploadedFiles = [];
    public $uploaded_files = [];

    protected $rules = [
        'forum.title'       => 'required|string|min:5|max:255',
        'forum.category'    => 'required',
        'forum.subCategory' => 'required',
        'forum.description' => 'required|string|min:15',
    ];

    protected $messages = [
        'forum.title.required'       => 'Please enter a title.',
        'forum.title.min'            => 'The title must be at least 5 characters.',
        'forum.category.required'    => 'Please select a category.',
        'forum.subCategory.required'    => 'Please select a Sub Category.',
        'forum.description.required' => 'Description is required.',
        'forum.description.min'      => 'Description must be at least 20 characters.',
    ];

    protected $listeners = ['select2Changed'];

    public function select2Changed($property, $value)
    {
        // $property will now be 'category'
        $this->forum[$property] = $value;
    }

    public function updatedUploadedFiles()
    {
        $this->validate([
            'uploadedFiles.*' => 'file|mimes:jpg,png,pdf,docx|max:10240', // max 10 MB
        ]);

        foreach ($this->uploadedFiles as $file) {
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('forum/tmp', $originalName, 'public');

            $this->uploaded_files[] = [
                'filename' => $originalName,
                'file_path' => $path,
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => Storage::disk('public')->size($path),
            ];
        }

        $this->uploadedFiles = []; // clear original input
    }


    public function removeTempFile($index)
    {
        if (!isset($this->uploaded_files[$index])) return;

        $file = $this->uploaded_files[$index];

        if (Storage::disk('public')->exists($file['file_path'])) {
            Storage::disk('public')->delete($file['file_path']);
        }

        unset($this->uploaded_files[$index]);
        $this->uploaded_files = array_values($this->uploaded_files);
    }


    public function save()
    {
        $this->validate();


        $forum = Forum::create([
            'user_id'          => Auth::user()->id,
            'title'          => $this->forum['title'],
            'category_id'    => $this->forum['category'],
            'sub_category_id' => $this->forum['subCategory'],
            'description'    => $this->forum['description'],
        ]);

        foreach ($this->uploaded_files as $file) {
            $tempPath = $file['file_path']; // e.g. forum/tmp/myfile.jpg
            $finalFolder = 'attachments/forum_' . $forum->id;
            $filename = $file['filename'];
            $finalPath = $finalFolder . '/' . $filename;

            // Move file from temp to main folder
            if (Storage::disk('public')->exists($tempPath)) {
                Storage::disk('public')->move($tempPath, $finalPath);

                // Save attachment record
                ForumAttachment::create([
                    'user_id'        => Auth::user()->id,
                    'forum_id'       => $forum->id,
                    'file_path'      => $finalPath,
                    'file_size'      => $file['file_size'] ?? 0,
                    'file_name'      => $filename,
                    'file_extension' => $file['file_type'] ?? "",
                ]);
            }
        }

        session()->flash('success', 'Your discussion has been created successfully!');

        $this->reset(['forum', 'uploaded_files']);
    }


    public function render()
    {
        $categories = Category::all()->toArray();
        $subCategories = Subcategory::all()->toArray();

        return view('livewire.forum.create', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
