<?php

namespace App\Interfaces;

interface AddressRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $new);
    public function update($id, array $new);
    public function delete($id);
    public function getAllCitys();
    public function getCityById($id);
    public function getAllStates();
    public function getStateById($id);
}
