<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController // Однометодные контроллеры
{
    public function __invoke() {
        return view('post.create', [
            'categories' => Category::all(),
            'tags' =>  Tag::all()
        ]);
    }
}
