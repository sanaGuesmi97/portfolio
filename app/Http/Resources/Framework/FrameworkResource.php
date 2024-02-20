<?php

namespace App\Http\Resources\Framework;

use Illuminate\Http\Resources\Json\JsonResource;

class FrameworkResource extends JsonResource
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
            'id'=>$this->id,
            'front_end'=>$this->front_end,
            'back_end'=>$this->back_end,

        ];
    }
}
