<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class transactions extends Model
{
    public $date;
    protected $table = 'transactions';
    protected $fillable = ['id', 'type', 'wallet_id', 'deposit_id', 'amount', 'user_id'];
    public $timestamps = true;

}


