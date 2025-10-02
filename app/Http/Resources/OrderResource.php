<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'product' => [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'description' => $this->product->description,
                'price' => $this->product->price,
                'default_img' => $this->product->default_image,
            ],
        ];
    }
}
