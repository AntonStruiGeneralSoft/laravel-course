<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;

class IndexController extends Controller // Однометодные контроллеры
{
    public function __invoke(FilterRequest $request) {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);

        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }
}
