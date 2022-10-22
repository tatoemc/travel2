<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Flight;
use App\Models\Payment;



class Ticket extends Model
{
    use HasFactory,SoftDeletes;
     protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
    public function payment()
    {
        //return $this->hasOne(Payment::class);
    }


}
