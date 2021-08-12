<?php


namespace App\Services\Post;

use App\Models\Post;
use App\Repository\Post\IPostRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostService
{
    /**
     * @var IPostRepository
     */
    private $postRepository;

    public function __construct(IPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function uploadPostMedia(Post $post, $media)
    {
        Media::query()
            ->findMany($media)
            ->each(function (Media $mediaFile) use ($post) {
                $mediaFile->move($post, 'posting');
                $mediaFile->model()->delete();
            });
    }

    public function getMyPosts($created_by)
    {
        return $this->postRepository->where('created_by', $created_by)->paginate(
            request()->query->get('limit', 10)
        );
    }
}
