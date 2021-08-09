<?php


namespace App\Repository\Post;


interface IPostRepository
{
    public function paginate(int $perPage = null, array $columns = ['*'], string $pageName = 'page', int $page = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
