<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

use App\Models\Post;

class ShowController extends BaseController // Однометодные контроллеры
{
    public function __invoke(Post $post) {
        return view('post.show', ['post' => $post]);
    }
}
