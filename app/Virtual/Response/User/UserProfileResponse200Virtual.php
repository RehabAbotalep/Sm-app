<?php


namespace App\Virtual\Response\User;


/**
 * @OA\Schema(
 *     title="User profile success response",
 *     description="User profile success response",
 *     type="object",
 * )
 */

class UserProfileResponse200Virtual
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status",
     *      example=200
     * )
     *
     * @var int
     */
    public $status;

    /**
     * @OA\Property(
     *      title="message",
     *      description="success message",
     *      example="user data!"
     * )
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(
     *      title="response",
     *      type="object",
     *      description="data object",
     *      @OA\Property(
     *          property="data",
     *          type="object",
     *          description="user profile data",
     *          @OA\Property(property="id", type="integer", description="user id", example=5),
     *          @OA\Property(property="name", description="user name", type="string", example="User Demo"),
     *          @OA\Property(property="email", description="User email", type="string", example="user@gmail.com"),
     *          @OA\Property(property="bio", description="user bio", type="string", example="Hi.."),
     *      ),
     *      @OA\Property(
     *          property="meta",
     *          type="object",
     *      )
     * )
     *
     * @var object
     */
    public $response;

    /**
     * @OA\Property(
     *      title="errors",
     *      type="object"
     * )
     *
     * @var ?object
     */
    public $errors;
}
