<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController // Однометодные контроллеры
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $this->service->store($data);
        
        return redirect()->route('posts.index');
    }
}
