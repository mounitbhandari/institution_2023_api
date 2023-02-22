<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $purchase_master_id;
    /**
     * @var mixed
     */
    private $transaction_master_id;
    /**
     * @var mixed
     */
    private $ledger_id;
    /**
     * @var mixed
     */
    private $transaction_type_id;
    /**
     * @var mixed
     */
    private $amount;


    public function ledger()
    {
        return $this->belongsTo(Ledger::class,'ledger_id');
    }
    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class,'transaction_type_id');
    }
}
