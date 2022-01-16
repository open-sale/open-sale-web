<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "image" => $this->image_path,
            "price" => $this->price,
            "size" => $this->size,
            "category" => $this->category,
        ];
    }
}
