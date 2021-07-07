<?php

namespace App\SwaggerDocs\Resources;

/**
 * @OA\Schema(
 *     title="InsuranceResource",
 *     description="Insurance resource",
 *     @OA\Xml(
 *         name="InsuranceResource"
 *     )
 * )
 */
class InsuranceResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\SwaggerDocs\Models\Insurance[]
     */
    private $data;
}
