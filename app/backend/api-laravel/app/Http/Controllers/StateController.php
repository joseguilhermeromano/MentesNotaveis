<?php

namespace App\Http\Controllers;

use App\Http\Resources\StateCollection;
use App\Interfaces\AddressRepositoryInterface;
use Illuminate\Http\JsonResponse;

class StateController
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display listing all objects states
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index():JsonResponse
    {
        $states = $this->addressRepository->getAllStates();
        $collection = new StateCollection($states);

        return response()->json([
            'message' => 'States',
            'code' => 200,
            'error' => false,
            'results' =>  $collection->response()
        ], 200);
    }

    /**
     * Display the specific state object
     *
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show($id):JsonResponse
    {
        $state =  $this->addressRepository->getStateById($id);
        $collection = new StateCollection([$state]);

        if(!$state) return response()->json(['message' => 'No state found'], 404);

        return response()->json([
            'message' => 'State detail',
            'code' => 200,
            'error' => false,
            'results' => $collection->response()
        ], 200);
    }
}
