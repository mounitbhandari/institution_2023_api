<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;

    public function ledgers() {
        return $this->hasMany(Ledger::class, 'ledger_group_id');
    }
}
