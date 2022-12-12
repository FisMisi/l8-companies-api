<?php

use App\Models\Company;
use function Pest\Faker\faker;
use function Pest\Laravel\getJson;

beforeEach(function () {
    $this->endpoint = 'api.companies';
});

uses()->group('api', 'company', 'controller');

it('has companies endpoint', function () {
    expect(Route::has($this->endpoint))->toBeTrue();
    $uri = Route::getRoutes()->getByName($this->endpoint)->uri;
    expect($uri)->toEqual('api/companies');
});

it('returns all companies when no company id', function () {
    Company::factory()->count(10)->create();
    $response = getJson(route($this->endpoint));
    $response->assertOk();
});

it('returns 422 with company id validation error', function ($ids) {
    Company::factory()->count(10)->create();
    $response = getJson(route($this->endpoint, ['companyId' => $ids]));
    $response->assertUnprocessable();
    $response->assertInvalid('companyId');
})->with([
    faker()->word(),
    faker()->randomFloat(3),
]);

it('returns empty data when the company is does not exist with given id', function () {
    Company::factory()->create(['id' => 11]);

    $response = getJson(route($this->endpoint, ['companyId' => [121]]));
    $response->assertOk();
    expect($response->json('data'))->toBeEmpty();
});

it('returns companies by given ids', function () {
    $c1 = Company::factory()->create(['id' => 11]);
    $c2 = Company::factory()->create(['id' => 12]);

    $response = getJson(route($this->endpoint, ['companyId' => [$c1->id, $c2->id]]));
    $response->assertOk();

    expect($response->json('data'))
        ->not->toBeEmpty();
    expect($response->json('data'))
        ->each
        ->toHaveKeys([
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
        ]);
});
