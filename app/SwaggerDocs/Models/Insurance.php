<?php

namespace App\SwaggerDocs\Models;

/**
 * @OA\Schema(
 *     title="Insurance",
 *     description="Insurance model",
 *     @OA\Xml(
 *         name="Insurance"
 *     )
 * )
 */
class Insurance
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="title",
     *      description="title of the new insurance company",
     *      example="Iran Insurance"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new insurance company",
     *      example="This is new insurance company's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="creator ID",
     *      description="Creator's id of the new Insurance Company",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $created_by;

    /**
     * @OA\Property(
     *     title="Companies",
     *     description="Companies wrapper"
     * )
     *
     * @var \App\SwaggerDocs\Models\InsuranceCompany[]
     */
    private $companies;
}
