<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;

class UpdateCompany extends Controller
{
    private CompanyService $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    /**
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function __invoke(UpdateCompanyRequest $request, Company $company): JsonResponse
    {
        $input = $request->validated();
        $this->service->updateCompany($company, $input);

        return new JsonResponse();
    }
}
