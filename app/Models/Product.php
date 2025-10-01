<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    /**
     * Get category
     *
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Get default_image attribute
     *
     * @return Attribute
     */
    public function defaultImage(): Attribute
    {
        return Attribute::get(function() {
            if (isset($this->images[0]) && is_string($this->images[0])) {
                return asset($this->images[0]);
            }

            return '';
        });
    }

    /**
     * Get image_urls attribute
     *
     * @return Attribute
     */
    public function imageUrls(): Attribute
    {
        return Attribute::get(function() {
            if (isset($this->images[0]) && is_string($this->images[0])) {
                $images = [];

                foreach ($this->images as $image) {
                    $images[] = asset($image);
                }

                return $images;
            }

            return [];
        });
    }

    /**
     * Update images
     *
     * @param array|UploadedFile|null $files
     * @return void
     */
    public function updateImages(array|UploadedFile|null $files): void
    {
        if ($files) {
            $images = [];

            foreach ($files as $image) {
                $imageName = uniqid() . '-' . $image->getClientOriginalName();

                $outputPath = public_path('images') . '/' . $imageName;

                if (file_exists($image->getRealPath())) {
                    $this->createThumbnailWithWatermark($image->getRealPath(), $outputPath);
                    $images []= 'images/' . $imageName;
                }
            }

            $this->images = $images;
            $this->save();
        }
    }

    /**
     * Create thumb for image
     *
     * @param $sourcePath
     * @param $outputPath
     * @return void
     */
    private function createThumbnailWithWatermark($sourcePath, $outputPath): void
    {
        [$origWidth, $origHeight, $imageType] = getimagesize($sourcePath);

        $srcImage = match ($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
        };

        $maxWidth = 300;
        $maxHeight = 300;

        if ($origWidth > $origHeight) {
            $newWidth = $maxWidth;
            $newHeight = $origHeight * $newWidth / $origWidth;
        } else {
            $newHeight = $maxHeight;
            $newWidth = $origWidth * $newHeight / $origHeight;
        }

        if ($newWidth > $maxWidth) {
            $newHeight = $newHeight * $maxWidth / $newWidth;
            $newWidth = $maxWidth;
        }

        if ($newHeight > $maxHeight) {
            $newWidth = $newHeight * $maxHeight / $newHeight;
            $newHeight = $maxHeight;
        }

        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresized($newImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        $text = "Shop";
        $fontSize = 10;
        $fontColor = imagecolorallocate($newImage, 100, 100, 100);
        imagestring($newImage, $fontSize, $newWidth - 40, $newHeight - 15, $text, $fontColor);

        imagejpeg($newImage, $outputPath, 90);

        imagedestroy($newImage);
        imagedestroy($srcImage);
    }
}
