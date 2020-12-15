<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class wallets extends Model
{
    public $date;
    protected $table = 'wallets';
    protected $fillable = ['id', 'user_id', 'billing_id', 'balance'];
    public $timestamps = true;

}


