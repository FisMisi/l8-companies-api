<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'registration_number' => $this->registration_number,
            'foundation_date' => $this->foundation_date,
            'country' => $this->country,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'street_address' => $this->street_address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'owner' => $this->owner,
            'employees' => $this->employees,
            'activity' => $this->activity,
            'active' => $this->active,
            'email' => $this->email,
        ];
    }
}
