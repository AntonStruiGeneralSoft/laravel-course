<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;

class IndexController extends BaseController // Однометодные контроллеры
{
    public function __invoke(FilterRequest $request) {
        // $this->authorize('view', auth()->user());

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);

        /*$query = Post::query(); // Неэффективная фильтрация 

        if (isset($data['category_id'])) {
            $query->where('category_id', '=', $data['category_id']);
        }
        if (isset($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }
        if (isset($data['content'])) {
            $query->where('content', 'like', "%{$data['content']}%");
        }

        $posts = $query->get();*/

        return view('post.index', [
            'posts' => $posts
        ]);
    }
}
