<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyService
{
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
