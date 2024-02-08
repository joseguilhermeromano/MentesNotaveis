<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'zipcode' => $this->zipcode,
            'place' => $this->place,
            'number' => $this->number,
            'district' => $this->district,
            'complement' => $this->complement,
            'city' => ["id" => $this->city->id, "name" => $this->city->name],
            'state' => [  "id" => $this->state->id
                        , "name" => $this->state->name
                        , "abbreviation" => $this->state->abbreviation  ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function response($request = null)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'zipcode' => $this->zipcode,
            'place' => $this->place,
            'number' => $this->number,
            'district' => $this->district,
            'complement' => $this->complement,
            'city' => ["id" => $this->city->id, "name" => $this->city->name],
            'state' => [  "id" => $this->state->id
                        , "name" => $this->state->name
                        , "abbreviation" => $this->state->abbreviation  ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
