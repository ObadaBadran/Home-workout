<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Organic extends JsonResource
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
            'begenning_date'=>$this->begenning_date,
            'finishing_date'=>$this->finishing_date,
            'eating_times'=>$this->eating_times,

        ];
       // return parent::toArray($request);
    }
}
