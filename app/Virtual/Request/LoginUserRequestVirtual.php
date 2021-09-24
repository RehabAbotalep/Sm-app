<?php


namespace App\Virtual\Request;

/**
 * Class LoginUserRequest
 * @package App\Virtual
 *
 * @OA\Schema (
 *     title="login user data",
 *     description="login user data",
 *     type="object",
 *     required={"grant_type", "client_id", "client_secret", "username", "password"}
 * )
 */
class LoginUserRequestVirtual
{
    /**
     * @var string
     *
     * @OA\Property (
     *     title="grant_type",
     *     type="string",
     *     description="shuld be *passwprd*",
     *     example="password"
     * )
     */
    public $grant_type;

    /**
     * @var int
     *
     * @OA\Property (
     *     title="cilent_id",
     *     type="integer",
     *     description="cilent id",
     *     example=2
     * )
     */
    public $client_id;

    /**
     * @var string
     *
     * @OA\Property (
     *     title="client_secret",
     *     type="string",
     *     description="client passwprd",
     *     example="bm5FLIEBut8BC2a2VO4VB0TuAWi0sit5PKHDa616"
     * )
     */
    public $client_secret;

    /**
     * @var string
     *
     * @OA\Property (
     *     title="username",
     *     type="string",
     *     description="user email",
     *     example="user@gmail.com"
     * )
     */
    public $username;

    /**
     * @var string
     *
     * @OA\Property (
     *     title="password",
     *     type="string",
     *     description="user password",
     *     example="12345678"
     * )
     */
    public $password;
}
