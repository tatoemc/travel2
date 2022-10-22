<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Flight;
use App\Models\Haj;


class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];


    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function hajs()
    {
        return $this->hasMany(Haj::class);
    }
    


}
