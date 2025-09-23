<?php

if (! function_exists('forum_file_path')) {
    /**
     * Generate a unique file path for forum attachments
     *
     * @param int $forumId       // Forum ID
     * @param string $originalName // Original file name
     * @param string|null $subType // Optional subfolder
     * @return string
     */
    function forum_file_path(int $forumId, string $originalName, string $subType = null): string
    {
        $timestamp = time();
        $sanitizedName = pathinfo($originalName, PATHINFO_FILENAME);
        $extension     = pathinfo($originalName, PATHINFO_EXTENSION);

        // Make filename safe + unique
        $slugFileName = \Illuminate\Support\Str::slug($sanitizedName);
        $finalFileName = $slugFileName . '-' . $timestamp . '.' . $extension;

        // Build path
        $path = "attachments/forum_{$forumId}";
        if ($subType) {
            $path .= "/{$subType}";
        }

        return $path . '/' . $finalFileName;
    }
}
