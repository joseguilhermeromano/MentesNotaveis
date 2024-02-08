<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\StateResource;

class StateCollection extends ResourceCollection
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
                function ( $state ) {
                    return new StateResource($state);
                }
            )
        ];
    }

    public function response($request = null)
    {
        return [
            'data' => $this->collection->map(
                function ( $state ) {
                    return new StateResource($state);
                }
            )
        ];
    }
}
