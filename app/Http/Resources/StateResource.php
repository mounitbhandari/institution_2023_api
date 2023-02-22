<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed state_name
 * @property mixed state_code
 */
class StateResource extends JsonResource
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
            'stateId'=>$this->id,
            'stateName'=>$this->state_name,
            'stateCode'=>$this->state_code
        ];
    }
}
