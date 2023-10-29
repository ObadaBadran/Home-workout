<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Exercise extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'counter'=>$this->counter,
            'duration'=>$this->duration,
            'description'=>$this->description,
            'calories'=>$this->calories,
            'gif_url'=>$this->gif_url,
            'points'=>$this->points,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
