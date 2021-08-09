<?php


namespace App\Virtual\Response;


/**
 * @OA\Schema(
 *     title="Meta data for pagination",
 *     description="Meta data for pagination",
 *     type="object",
 * )
 */

class PaginationMetaVirtual
{
    /**
     * @OA\Property(
     *      title="current_page",
     *      description="Current page",
     *      example=1
     * )
     *
     * @var int
     */
    public $current_page;

    /**
     * @OA\Property(
     *      title="from",
     *      description="From",
     *      example=1
     * )
     *
     * @var int
     */
    public $from;

    /**
     * @OA\Property(
     *      title="last_page",
     *      description="Last page",
     *      example=5
     * )
     *
     * @var int
     */
    public $last_page;

    /**
     * @OA\Property(
     *      title="path",
     *      description="Path",
     *      example="http://localhost/api/1.0/posts"
     * )
     *
     * @var string
     */
    public $path;

    /**
     * @OA\Property(
     *      title="per_page",
     *      description="Per page",
     *      example=20
     * )
     *
     * @var int
     */
    public $per_page;

    // @TODO: create meta model for pagination by id
    /**
     * @OA\Property(
     *      title="first_post_id",
     *      description="first_post_id",
     *      example=1
     * )
     *
     * @var int
     */
    public $first_post_id;

    /**
     * @OA\Property(
     *      title="last_post_id",
     *      description="last_post_id",
     *      example=20
     * )
     *
     * @var int
     */
    public $last_post_id;

    /**
     * @OA\Property(
     *      title="to",
     *      description="To",
     *      example=2
     * )
     *
     * @var int
     */
    public $to;

    /**
     * @OA\Property(
     *      title="total",
     *      description="Total",
     *      example=5
     * )
     *
     * @var int
     */
    public $total;
}
