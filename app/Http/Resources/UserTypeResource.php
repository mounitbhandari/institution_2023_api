<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed user_type_name
 * @property mixed id
 */
class UserTypeResource extends JsonResource
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
            'userTypeId' => $this->id,
            'userTypeName' => $this->user_type_name,
        ];
    }
}
