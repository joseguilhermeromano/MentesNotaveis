<?php
namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;
use App\Models\City;
use App\Models\State;

class AddressRepository implements AddressRepositoryInterface
{

    public function getAll(){
        return Address::orderBy('name', 'asc')->get();
    }

    public function getById($id){
        return Address::find($id);
    }

    public function create(array $new) {
        $addressExists = Address::where('name', $new['name'])
        ->where('zipcode', $new['zipcode'])
        ->where('place', $new['place'])
        ->where('number', $new['number'])
        ->where('district', $new['district'])
        ->where('complement', $new['complement'])
        ->where('city_id', $new['city_id'])
        ->where('state_id', $new['state_id'])
        ->first();
        return $addressExists ? $addressExists : Address::create($new);
    }

    public function update($id, array $new){
        Address::whereId($id)->update($new);
        return Address::find($id);
    }

    public function delete($id){
        Address::destroy($id);
    }

    public function getAllCitys(){
        return City::orderBy('name', 'asc')->get();
    }

    public function getCityById($id){
        return City::find($id);
    }

    public function getAllStates(){
        return State::orderBy('name', 'asc')->get();
    }

    public function getStateById($id){
        return State::find($id);
    }
}
