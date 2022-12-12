<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string $registration_number
 * @property string $foundation_date
 * @property string $country
 * @property string $zip_code
 * @property string $city
 * @property string $street_address
 * @property string $latitude
 * @property string $longitude
 * @property string $owner
 * @property int $employees
 * @property string $activity
 * @property int $active
 * @property string $email
 * @property string $password
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFoundationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereZipCode($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
class Company extends Model
{
    use HasFactory;

    public bool $timestamps = false;

    protected $fillable = [
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
        'password',
    ];
}
