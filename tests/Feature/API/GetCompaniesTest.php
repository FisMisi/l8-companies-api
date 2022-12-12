<?php

use App\Models\Company;
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

it('returns all companies', function () {
    Company::factory()->count(10)->create();
    $response = getJson(route($this->endpoint));
    $response->assertOk();
});
