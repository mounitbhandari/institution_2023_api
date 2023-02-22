<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DurationTypeResource extends JsonResource
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
            'durationTypeId'=>$this->id,
            'durationName'=>$this->duration_name,
        ];
    }
}
