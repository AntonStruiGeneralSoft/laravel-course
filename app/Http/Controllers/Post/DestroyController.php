<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

use App\Models\Post;

class DestroyController extends BaseController // Однометодные контроллеры
{
    public function __invoke(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
