<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'address';
    protected $fillable = ['name', 'zipcode', 'place', 'number'
                          ,'district', 'complement', 'city_id', 'state_id'];


    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function State()
    {
        return $this->belongsTo(State::class);
    }
}
