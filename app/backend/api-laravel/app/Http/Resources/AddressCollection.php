<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\AddressResource;

class AddressCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(
                function ( $address ) {
                    return new AddressResource($address);
                }
            )
        ];
    }

    public function response($request = null)
    {
        return [
            'data' => $this->collection->map(
                function ( $address ) {
                    return new AddressResource($address);
                }
            )
        ];
    }
}
