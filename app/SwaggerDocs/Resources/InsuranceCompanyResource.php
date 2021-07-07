<?php

namespace App\SwaggerDocs\Resources;

/**
 * @OA\Schema(
 *     title="InsuranceCompanyResource",
 *     description="Insurance Company resource",
 *     @OA\Xml(
 *         name="InsuranceCompanyResource"
 *     )
 * )
 */
class InsuranceCompanyResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Project[]
     */
    private $data;
}
