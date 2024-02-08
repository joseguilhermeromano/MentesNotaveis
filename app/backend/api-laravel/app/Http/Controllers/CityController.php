<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityCollection;
use App\Interfaces\AddressRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CityController
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display listing all objects citys
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index():JsonResponse
    {
        $citys = $this->addressRepository->getAllCitys();
        $collection = new CityCollection($citys);

        return response()->json([
            'message' => 'Citys',
            'code' => 200,
            'error' => false,
            'results' =>  $collection->response()
        ], 200);
    }

    /**
     * Display the specific city object
     *
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show($id):JsonResponse
    {
        $city =  $this->addressRepository->getCityById($id);
        $collection = new CityCollection([$city]);

        if(!$city) return response()->json(['message' => 'No city found'], 404);

        return response()->json([
            'message' => 'City detail',
            'code' => 200,
            'error' => false,
            'results' => $collection->response()
        ], 200);
    }
}
