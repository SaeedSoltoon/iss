<?php

namespace App\SwaggerDocs\Models;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
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
     *      title="email",
     *      description="email of the new user",
     *      example="mr.saeed.soltani@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="active",
     *      description="status of the new user",
     *      example="1|0"
     * )
     *
     * @var bool
     */
    public $active;

    /**
     * @OA\Property(
     *      title="timezone",
     *      description="timezone of the new user",
     *      example="UTC"
     * )
     *
     * @var string
     */
    public $timezone;


    /**
     * @OA\Property(
     *      title="to be logged out",
     *      description="determine user should be logged out.",
     *      example="1|0"
     * )
     *
     * @var bool
     */
    public $to_be_logged_out;

    /**
     * @OA\Property(
     *      title="last login IP",
     *      description="last login IP of the new user",
     *      example="1.2.3.4"
     * )
     *
     * @var string
     */
    public $last_login_ip;

    /**
     * @OA\Property(
     *     title="email verified at",
     *     description="email verified at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $eamil_verified_at;

    /**
     * @OA\Property(
     *     title="password changed at",
     *     description="password changed at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $password_changed_at;

    /**
     * @OA\Property(
     *      title="provider",
     *      description="who is the provider of the user.",
     *      example="admin"
     * )
     *
     * @var string
     */
    public $provider;

    /**
     * @OA\Property(
     *     title="provider at",
     *     description="provider at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $provider_at;

    /**
     * @OA\Property(
     *     title="last login at",
     *     description="last login at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $last_login_at;

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
     *      title="avatar",
     *      description="avatar of the new user",
     *      example="UTC"
     * )
     *
     * @var string
     */
    public $avatar;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\SwaggerDocs\Models\Permission[]
     */
    private $permissions;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\SwaggerDocs\Models\Role[]
     */
    private $roles;
}
