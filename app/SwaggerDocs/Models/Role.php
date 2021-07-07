<?php

namespace App\SwaggerDocs\Models;

/**
 * @OA\Schema(
 *     title="Role",
 *     description="Role model",
 *     @OA\Xml(
 *         name="Role"
 *     )
 * )
 */
class Role
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
     *      description="type of the new user",
     *      example="admin|user"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new user",
     *      example="Saeed"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Guard name",
     *      description="Guard name of the new user",
     *      example="web"
     * )
     *
     * @var string
     */
    public $guard_name;

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
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\SwaggerDocs\Models\Permission[]
     */
    private $permissions;
}
