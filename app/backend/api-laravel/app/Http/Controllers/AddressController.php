<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\City;
use App\Models\State;
use App\Http\Resources\AddressCollection;
use App\Interfaces\AddressRepositoryInterface;
use Illuminate\Http\JsonResponse;
use DB;

class AddressController
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display listing all objects addresses
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index(){

        $address = $this->addressRepository->getAll();
        $collection = new AddressCollection($address);

        return response()->json([
            'message' => 'Addresses',
            'code' => 200,
            'error' => false,
            'results' =>  $collection->response()
        ], 200);
    }

    /**
     * Create a new object Address
     *
     * @param App\Http\Requests\AddressRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(AddressRequest $request):JsonResponse
    {

        $requestData = $request->only([
            'name',
            'zipcode',
            'place',
            'number',
            'district',
            'complement',
            'city',
            'state',
            'abbreviation_state'
        ]);

        DB::beginTransaction();

        try{
            $city = City::firstOrCreate([
                'name' => $requestData['city'],
            ]);

            $state = State::firstOrCreate([
                'name' => $requestData['state'],
                'abbreviation' => $requestData['abbreviation_state']
            ]);

            $data = [
                'name' => $requestData['name'],
                'zipcode' => $requestData['zipcode'],
                'place' => $requestData['place'],
                'number' => $requestData['number'],
                'district' => $requestData['district'],
                'complement' => $requestData['complement'],
                'city_id' => $city->id,
                'state_id' => $state->id
            ];

            $address = $this->addressRepository->create($data);
            $collection = new AddressCollection([$address]);

            DB::commit();

            return response()->json([
                'message' => 'Address created',
                'code' => 200,
                'error' => false,
                'results' => $collection->toArray($request)
            ], 201);

        }catch(\Exception $e){

            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);

        }
    }

    /**
     * Display the specific address object
     *
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show($id):JsonResponse
    {
        $address =  $this->addressRepository->getById($id);
        $collection = new AddressCollection([$address]);

        if(!$address) return response()->json(['message' => 'No address found'], 404);

        return response()->json([
            'message' => 'Address detail',
            'code' => 200,
            'error' => false,
            'results' => $collection->response()
        ], 200);
    }

    /**
     * Update the specific address object from storage
     *
     * @param App\Http\Requests\AddressRequest $request
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function update(AddressRequest $request, $id):JsonResponse
    {

        $requestData = $request->only([
            'name',
            'zipcode',
            'place',
            'number',
            'district',
            'complement',
            'city',
            'state',
            'abbreviation_state'
        ]);

        DB::beginTransaction();
        try {
            $address = $this->addressRepository->getById($id);

            if(!$address) return response()->json(['message' => 'No address found'], 404);

            $city = City::updateOrCreate([
                'name' => $requestData['city'],
            ]);

            $state = State::updateOrCreate([
                'name' => $requestData['state'],
                'abbreviation' => $requestData['abbreviation_state']
            ]);

            $data = [
                'name' => $requestData['name'],
                'zipcode' => $requestData['zipcode'],
                'place' => $requestData['place'],
                'number' => $requestData['number'],
                'district' => $requestData['district'],
                'complement' => $requestData['complement'],
                'city_id' => $city->id,
                'state_id' => $state->id
            ];

            $address = $this->addressRepository->update($id, $data);
            $collection = new AddressCollection([$address]);

            DB::commit();
            return response()->json([
                'message' => 'Address updated',
                'code' => 200,
                'error' => false,
                'results' => $collection->toArray($request)
            ], 200);

        } catch(\Exception $e) {

            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }

    /**
     * Remove the specific address object from storage
     *
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy($id):JsonResponse
    {
        DB::beginTransaction();
        try {
            $address =  $this->addressRepository->getById($id);
            $collection = new AddressCollection([$address]);

            if(!$address) return response()->json(['message' => 'No address found'], 404);

            $address->delete();

            DB::commit();
            return response()->json([
                'message' => 'Address deleted',
                'code' => 200,
                'error' => false,
                'results' => $collection->response()
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }

}
