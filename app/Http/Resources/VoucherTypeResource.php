<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed voucher_type_name
 * @property mixed id
 */
class VoucherTypeResource extends JsonResource
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
            "voucherTypeId"=>$this->id,
            "voucherTypeName"=>$this->voucher_type_name
        ];
    }
}
