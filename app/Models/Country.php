<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;
class Country extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function flights()
    {
        return $this->hasMany(Flight::class);
    }


}
