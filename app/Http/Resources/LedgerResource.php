<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed ledger_name
 * @property mixed id
 * @property mixed billing_name
 * @property mixed address
 * @property mixed city
 * @property mixed district
 * @property mixed state_id
 * @property mixed pin
 * @property mixed state
 */
class LedgerResource extends JsonResource
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
            'ledgerId'=>$this->id,
            'ledgerName'=>$this->ledger_name,
            'billingName'=>$this->billing_name,
        ];
    }
}
