<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class deposits extends Model
{
    public $date;
    protected $table = 'deposits';
    protected $fillable = ['id', 'user_id', 'wallet_id', 'invested', 'percent', 'active', 'duration','accrue_times'];
    public $timestamps = true;

}


