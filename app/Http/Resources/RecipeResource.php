<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id ,
            "kitchen" => $this->kitchen ,
            "category" => $this->category, 
            "occasion" => $this->occasion,
            "title" => $this->title,
            "description" => $this->description,
            "main_image" => $this->main_image,
            "cooking_time" => $this->cooking_time,
            "number_of_people" => $this->number_of_people,
            "ingredients" => $this->ingredients,
            "prepares" => $this->prepares,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
