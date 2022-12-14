<?php

use App\Http\Controllers\API\CreateCompany;
use App\Http\Requests\API\CreateCompanyRequest;
use App\Services\CompanyService;
use function Pest\Faker\faker;
use function Pest\Laravel\partialMock;
use function Pest\Laravel\postJson;

beforeEach(function () {
    $this->endpoint = 'api.companies.store';
});

it('has create company api root', function () {
    expect(Route::has($this->endpoint))->toBeTrue();
    $uri = Route::getRoutes()->getByName($this->endpoint)->uri;
    expect($uri)->toBe('api/companies');
});

it('validates with CreateCompanyRequest', function () {
    $this->assertActionUsesFormRequest(
        CreateCompany::class,
        '__invoke',
        CreateCompanyRequest::class
    );
});

test('new company created', function () {
    $mock = partialMock(CompanyService::class);
    $mock->shouldReceive('createCompany');

    $response = postJson(route($this->endpoint, [
        'name' => faker()->name(),
        'registration_number' => faker()->bothify('######-####'),
        'foundation_date' => faker()->date,
        'country' => faker()->country,
        'zip_code' => faker()->postcode,
        'city' => faker()->city,
        'street_address' => faker()->address,
        'latitude' => faker()->latitude,
        'longitude' => faker()->longitude,
        'owner' => faker()->name,
        'employees' => faker()->numberBetween(5, 100),
        'activity' => faker()->word,
        'active' => faker()->boolean,
        'email' => faker()->email,
        'password' => faker()->password,
    ]));

    $response->assertCreated();
});
