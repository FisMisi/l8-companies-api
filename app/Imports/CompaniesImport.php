<?php

namespace App\Imports;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CompaniesImport implements ToModel, WithUpserts, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return Company
     */
    public function model(array $row): Company
    {
        return new Company([
            'id' => $row['companyId'],
            'name' => $row['companyName'],
            'registration_number' => $row['companyRegistrationNumber'],
            'foundation_date' => $row['companyFoundationDate'],
            'country' => $row['country'],
            'zip_code' => $row['zipCode'],
            'city' => $row['city'],
            'street_address' => $row['streetAddress'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'owner' => $row['companyOwner'],
            'employees' => $row['employees'],
            'activity' => $row['activity'],
            'active' => $row['active'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function uniqueBy(): string
    {
        return 'email';
    }
}
