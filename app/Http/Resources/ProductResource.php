<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imageUrls = $this->image_urls;

        if (is_array($imageUrls) && count($imageUrls)) {
            array_shift($imageUrls);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image_urls' => $imageUrls,
            'default_img' => $this->default_image,
        ];
    }
}
