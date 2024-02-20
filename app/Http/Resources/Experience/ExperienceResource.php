<?php

namespace App\Http\Resources\Experience;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id" => $this->id,
            "date" => $this->date,
            "title" => $this->title,
            "small_description" => $this->small_description,
            "address" => $this->address,
            "description" => $this->description,
            "technologies" => $this->technologies,
            "link" => $this->link,
        ];
    }
}
