<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

trait ImageUploadTrait
{
    /**
     * Upload an image to the given storage disk path.
     *
     * @param  UploadedFile  $file        The uploaded file instance.
     * @param  string        $path        Storage path relative to 'public' disk (e.g. 'sliders').
     * @param  int|null      $width       Max width to resize to (maintains aspect ratio). Null = no resize.
     * @param  int|null      $height      Max height to resize to. Null = no resize.
     * @param  string|null   $oldImage    Relative path of old image to delete (e.g. 'sliders/old.webp').
     * @return string  Relative path stored in DB (e.g. 'sliders/abc123.webp').
     */
    protected function uploadImage(
        UploadedFile $file,
        string $path,
        ?int $width = 1200,
        ?int $height = null,
        ?string $oldImage = null
    ): string {
        // Validate file is a real image
        abort_unless(
            in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp']),
            422,
            'Invalid image file type.'
        );

        // Delete old image if provided
        if ($oldImage) {
            $this->deleteImage($oldImage);
        }

        // Generate unique filename using webp for optimal compression
        $filename = Str::uuid() . '.webp';
        $storagePath = $path . '/' . $filename;

        // Process and optimize with Intervention Image
        $image = Image::read($file->getRealPath());

        if ($width || $height) {
            $image->scaleDown(width: $width, height: $height);
        }

        // Encode to webp at 85% quality for optimal size/quality balance
        $encoded = $image->toWebp(quality: 85);

        Storage::disk('public')->put($storagePath, (string) $encoded);

        return $storagePath;
    }

    /**
     * Delete an image from storage.
     *
     * @param  string|null  $path  Relative path stored in DB (e.g. 'sliders/abc123.webp').
     */
    protected function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Upload multiple images and return array of stored paths.
     *
     * @param  UploadedFile[]  $files
     * @param  string          $path
     * @param  int|null        $width
     * @param  int|null        $height
     * @return string[]
     */
    protected function uploadMultipleImages(
        array $files,
        string $path,
        ?int $width = 1200,
        ?int $height = null
    ): array {
        $paths = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $paths[] = $this->uploadImage($file, $path, $width, $height);
            }
        }
        return $paths;
    }

    /**
     * Get the public URL for a stored image.
     */
    protected function imageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }
        return Storage::disk('public')->url($path);
    }
}
