<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
{
    public function getCompanies()
    {
        return Company::query()
            ->select([
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
            ])->get();
    }
}
