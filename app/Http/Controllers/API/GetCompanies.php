<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\GetCompaniesRequest;
use App\Http\Resources\API\CompanyResource;
use App\Services\CompanyService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetCompanies extends Controller
{
    private CompanyService $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    /**
     * @param GetCompaniesRequest $request
     * @return AnonymousResourceCollection
     */
    public function __invoke(GetCompaniesRequest $request): AnonymousResourceCollection
    {
        return CompanyResource::collection($this->service->getCompaniesByIds($request->input('companyId', [])));
    }
}
