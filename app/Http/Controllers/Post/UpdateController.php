<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;

use App\Models\Post;

class UpdateController extends BaseController // Однометодные контроллеры
{
    public function __invoke(UpdateRequest $request, Post $post) {
        $data = $request->validated();

        $this->service->update($post, $data);
        
        return redirect()->route('posts.show', $post->id);
    }
}
