<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Day extends JsonResource
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
            'day_name'=>$this->day_name,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
       // return parent::toArray($request);
    }
}
