<?php

namespace App\Http\Resources\Data_Base;

use Illuminate\Http\Resources\Json\JsonResource;

class DataBaseResource extends JsonResource
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
            'id'=>$this->id,
            'sql'=>$this->sql,
            'nosql'=>$this->nosql,
        ];
    }
}
