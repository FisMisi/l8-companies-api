<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class CompanyService
{
    /**
     * @param array $input
     * @return Company
     */
    public function createCompany(array $input): Company
    {
        return Company::create([
            'name' => $input['name'],
            'registration_number' => $input['registration_number'],
            'foundation_date' => $input['foundation_date'],
            'country' => $input['country'],
            'zip_code' => $input['zip_code'],
            'city' => $input['city'],
            'street_address' => $input['street_address'],
            'latitude' => $input['latitude'],
            'longitude' => $input['longitude'],
            'owner' => $input['owner'],
            'employees' => $input['employees'],
            'activity' => $input['activity'],
            'active' => $input['active'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    /**
     * @param array $ids
     * @return Collection
     */
    public function getCompaniesByIds(array $ids = []): Collection
    {
        $cols = [
            'id',
            'name',
            'registration_number',
            'foundation_date',
            'country',
            'zip_code',
            'city',
            'street_address',
            'latitude',
            'longitude',
            'owner',
            'employees',
            'activity',
            'active',
            'email',
        ];

        if (empty($ids)) {
            return Company::query()
                ->select($cols)
                ->get();
        }

        return Company::query()
            ->select($cols)
            ->findMany($ids);
    }
}
