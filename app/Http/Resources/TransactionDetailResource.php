<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed transaction_master_id
 * @property mixed amount
 * @property mixed ledger
 * @property mixed transaction_type
 */
class TransactionDetailResource extends JsonResource
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
            "transactionDetailId"=>$this->id,
            "transaction_master_id"=>$this->transaction_master_id,
            "ledger"=>new LedgerResource($this->ledger),
            "transactionType"=>new TransactionTypeResource($this->transaction_type),
            "amount"=>$this->amount,
        ];
    }
}
