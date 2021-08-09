<?php


namespace App\Virtual\Response;

/**
 * @OA\Schema(
 *     title="success accepted 202",
 *     description="success accepted 202",
 *     type="object",
 * )
 */
class SuccessAcceptedVirtual
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
     *      description="message",
     *      example="success accepted"
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
     *          description="null or data sent in the request body",
     *          example=null
     *      ),
     *      @OA\Property(
     *          property="meta",
     *          type="object",
     *          example=null
     *      )
     * )
     *
     * @var object
     */
    public $response;


    /**
     * @OA\Property(
     *      title="errors",
     *      type="object",
     *      example=null
     * )
     *
     * @var object
     */
    public $errors;
}
