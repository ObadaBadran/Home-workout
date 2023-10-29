<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Program extends JsonResource
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
            'periods'=>$this->periods,
            'times_in_week'=>$this->times_in_week,
        ];
      //  return parent::toArray($request);
    }
}
