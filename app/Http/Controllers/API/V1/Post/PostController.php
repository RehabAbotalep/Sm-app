<?php

namespace App\Http\Controllers\API\V1\Post;

use App\Http\Controllers\APIV1Controller;
use App\Http\Resources\FeedResource;
use App\Models\Comment;
use App\Models\Post;
use App\Services\Post\FeedService;
use App\Services\Post\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;
use Psr\Http\Message\ServerRequestInterface;

class PostController extends APIV1Controller
{
    /**
     * @var PostService
     */
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function store(Request $request): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $data = $this->isValid($request);
        $data['created_by'] = auth()->id();
        $post = Post::create($data);
        if($request->has('media')){
            $this->postService->uploadPostMedia($post, $request->media);
        }
        return $this->accepted(
            (new FeedResource($post))->resolve()
        );
    }

    private function isValid(Request $request): array
    {
        $rules = [
            'body' => 'required',
        ];
        try {
            $this->validate($request, $rules);
            return $request->only('body', 'color');
        }catch (ValidationException $exception){
            throw ValidationException::withMessages($exception->errors());
        }
    }

    public function index(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return $this->okWithPagination(
            FeedResource::collection(
                $this->postService->getMyPosts(auth()->id())
            )
        );
    }

}
