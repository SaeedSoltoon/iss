<?php

namespace App\SwaggerDocs\Models;

/**
 * @OA\Schema(
 *     title="Permission",
 *     description="Permission model",
 *     @OA\Xml(
 *         name="Permission"
 *     )
 * )
 */
class Permission
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
     *      title="type",
     *      description="type of the new permission",
     *      example="admin|permission"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new permission",
     *      example="Saeed"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Guard name",
     *      description="Guard name of the new permission",
     *      example="web"
     * )
     *
     * @var string
     */
    public $guard_name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new permission",
     *      example="Saeed"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Parent ID",
     *     description="Parent ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $parent_id;

    /**
     * @OA\Property(
     *     title="Parent ID",
     *     description="Parent ID",
     *     format="tinyint",
     *     example=1
     * )
     *
     * @var integer
     */
    private $sort;

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
}
