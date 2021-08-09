<?php


namespace App\Virtual\Response;

/**
 * @OA\Schema(
 *     title="success 200",
 *     description="success 200",
 *     type="object",
 * )
 */
class SuccessOkVirtual
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status",
     *      example=true
     * )
     *
     * @var bool
     */
    public $status;

    /**
     * @OA\Property(
     *      title="message",
     *      description="Success message",
     *      example="success"
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
     *          description="null or data sent in the request body"
     *      ),
     *      @OA\Property(
     *          property="meta",
     *          type="object"
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
