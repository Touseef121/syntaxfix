<?php

namespace App\Livewire\Forum\User;

use App\Models\User;
use App\Models\UserProfilePicture;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $userId;
    public $avatar; // temporary file for new upload
    public $currentAvatar; // DB record for active avatar
    public $showRemoveModal = false;

    public function mount($id)
    {
        $this->userId = $id;
        $this->user = User::findOrFail($id)->toArray();

        $this->currentAvatar = UserProfilePicture::where('user_id', $this->userId)
            ->whereNull('deleted_at')
            ->latest()
            ->first();
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB
        ]);
    }

    public function save()
    {
        // ✅ Validate main profile fields
        $this->validate(
            [
                'user.name'     => 'required|string|max:255',
                'user.email'    => 'required|email|max:255|unique:users,email,' . $this->userId,
                'user.bio'      => 'nullable|string|max:500',
                'user.location' => 'nullable|string|max:255',
                'user.website'  => 'nullable|url|max:255',
                'avatar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'user.name.required'  => 'The name field is required.',
                'user.name.string'    => 'The name must be a valid string.',
                'user.name.max'       => 'The name may not be greater than 255 characters.',

                'user.email.required' => 'The email field is required.',
                'user.email.email'    => 'Please provide a valid email address.',
                'user.email.max'      => 'The email may not be greater than 255 characters.',
                'user.email.unique'   => 'This email is already taken.',

                'user.bio.max'        => 'Your bio may not be longer than 500 characters.',

                'user.location.max'   => 'The location may not be greater than 255 characters.',

                'user.website.url'    => 'Please enter a valid website URL.',
                'user.website.max'    => 'The website URL may not be greater than 255 characters.',

                'avatar.image'        => 'The file must be an image.',
                'avatar.mimes'        => 'Only JPG and PNG formats are allowed.',
                'avatar.max'          => 'The image must not be larger than 2MB.',
            ]
        );


        if ($this->avatar) {
            UserProfilePicture::where('user_id', $this->userId)
                ->whereNull('deleted_at')
                ->update(['deleted_at' => now()]);

            $fileName = time() . '.' . $this->avatar->getClientOriginalExtension();
            $path = $this->avatar->storeAs('avatars', $fileName, 'public');

            $profilePic = UserProfilePicture::create([
                'user_id'        => $this->userId,
                'file_path'      => $path,
                'file_extension' => $this->avatar->getClientOriginalExtension(),
                'file_size'      => $this->avatar->getSize(),
                'file_name'      => $this->avatar->getClientOriginalName(),
            ]);

            $this->currentAvatar = $profilePic;
            $this->avatar = null;
        }

        // ✅ Save user details (because $this->user is array)
        User::where('id', $this->userId)->update([
            'name'     => $this->user['name'],
            'email'    => $this->user['email'],
            'bio'      => $this->user['bio'] ?? null,
            'location' => $this->user['location'] ?? null,
            'website'  => $this->user['website'] ?? null,
        ]);

        session()->flash('success', 'Profile updated successfully.');
    }

    public function confirmRemove()
    {
        $this->showRemoveModal = true;
    }

    public function removeAvatar()
    {
        if ($this->currentAvatar) {
            $this->currentAvatar->update(['deleted_at' => now()]);
            $this->currentAvatar = null;
        }

        $this->showRemoveModal = false;

        session()->flash('success', 'Profile picture removed. Default applied.');
    }

    public function render()
    {
        return view('livewire.forum.user.edit-profile');
    }
}
