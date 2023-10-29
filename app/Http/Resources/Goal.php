<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
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
            'goal_name'=>$this->begenning_date,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
      //  return parent::toArray($request);
    }
}
