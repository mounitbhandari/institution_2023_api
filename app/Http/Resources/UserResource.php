<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @property mixed id
 * @property mixed user_name
 * @property mixed email
 * @property mixed password
 */
class UserResource extends JsonResource
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
            'uniqueId' => $this->id,
            'userName' => $this->user_name,
            'userTypeId' => $this->user_type_id,
            'userTypeName' => $this->user_type->user_type_name,
        ];
    }
}
