<?php

use App\Http\Controllers\API\CreateCompany;
use App\Http\Requests\API\CreateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
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

it('should return the new company details', function () {
    $pwd = 'password';
    $company = Company::factory()->create(['password' => $pwd]);
    $mock = partialMock(CompanyService::class);
    $mock->shouldReceive('createCompany')
         ->andReturn($company);

    $response = postJson(route($this->endpoint, [
        'name' => $company->name,
        'registration_number' => $company->registration_number,
        'foundation_date' => $company->foundation_date,
        'country' => $company->country,
        'zip_code' => $company->zip_code,
        'city' => $company->city,
        'street_address' => $company->street_address,
        'latitude' => $company->latitude,
        'longitude' => $company->longitude,
        'owner' => $company->owner,
        'employees' => $company->employees,
        'activity' => $company->activity,
        'active' => $company->active,
        'email' => $company->email,
        'password' => $pwd,
    ]));

    $response->assertOk();
});
