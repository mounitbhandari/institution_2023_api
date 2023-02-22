<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed organisation_name
 */
class OrganisationResource extends JsonResource
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
            'organisationId' => $this->id,
            'organisationName' => $this->organisation_name,
            'address' => $this->address,
            'city' => $this->city,
            'contactNumber' => $this->contact_number,
            'emailId' => $this->email_id
        ];
    }
}
