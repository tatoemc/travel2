<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company;
use App\Models\Country;
use App\Models\City;
use App\Models\Ticket;


class Flight extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    use SoftDeletes;
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
  
}
