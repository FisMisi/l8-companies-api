<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateCompanyRequest;
use App\Services\CompanyService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateCompany extends Controller
{
    private CompanyService $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CreateCompanyRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateCompanyRequest $request): JsonResponse
    {
        $input = $request->validated();
        $this->service->createCompany($input);

        return new JsonResponse([],201);
    }
}
