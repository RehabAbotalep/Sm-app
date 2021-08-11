<?php

namespace App\Http\Controllers\API\V1\Post;

use App\Http\Controllers\APIV1Controller;
use App\Http\Resources\FeedResource;
use App\Models\Comment;
use App\Services\Post\FeedService;
use Illuminate\Http\Request;

class FeedController extends APIV1Controller
{
    /**
     * @var FeedService
     */
    private $feedService;

    public function __construct(FeedService $feedService)
    {
        $this->feedService = $feedService;
    }

    public function feed()
    {
        /*Comment::query()->create([
                'body' => 'Hii comment',
                'post_id' => 1,
                'commented_by' => 1
        ]);*/
        Comment::query()->where('id', 162)->withTrashed()->forceDelete();

        return $this->okWithPagination(
            FeedResource::collection($this->feedService->getMyFeed())
        );
    }
}
