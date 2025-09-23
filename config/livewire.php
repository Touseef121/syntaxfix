<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Temporary File Uploads
    |--------------------------------------------------------------------------
    |
    | Here you may configure how Livewire handles temporary file uploads.
    | The default is to store files on the "public" disk inside
    | the "livewire-tmp" directory.
    |
    */

    'temporary_file_upload' => [
        'disk' => 'public',
        'directory' => 'livewire-tmp',
        'rules' => null, // optional validation rules
        'middleware' => ['web'],
    ],

];
