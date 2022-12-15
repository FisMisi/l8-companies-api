<?php

use App\Http\Controllers\API\UpdateCompany;
use App\Http\Requests\API\UpdateCompanyRequest;
use App\Models\Company;
use function Pest\Faker\faker;
use function Pest\Laravel\patchJson;

uses()->group('controller', 'api', 'company');

beforeEach(function () {
    $this->endpoint = 'api.companies.update';
});

it('has update company endpoint', function () {
    expect(Route::has($this->endpoint))->toBeTrue();
    $uri = Route::getRoutes()->getByName($this->endpoint)->uri;
    expect($uri)->toBe('api/companies/{company}');
});

it('validates with UpdateCompanyRequest', function () {
    $this->assertActionUsesFormRequest(
        UpdateCompany::class,
        '__invoke',
        UpdateCompanyRequest::class
    );
});

it('get 404 when company not found', function () {
    $response = patchJson(route($this->endpoint, ['company' => faker()->randomNumber()]));
    $response->assertStatus(404);
});

test('company has been updated with new company name and email', function () {
    $company = Company::factory()->create();
    $newEmail = faker()->email;
    $newCompanyName = faker()->company;
    $response = patchJson(route($this->endpoint, [
        'company' => $company->id,
        'name' => $newCompanyName,
        'registration_number' => faker()->bothify('######-####'),
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
        'email' => $newEmail,
        'password' => faker()->password,
    ]));
    $response->assertOk();

    expect($company->fresh())
        ->name->toBe($newCompanyName)
        ->email->toBe($newEmail);
});
