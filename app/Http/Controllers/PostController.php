<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{
    /*
    public function index() {
        $posts = Post::all();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd($posts);
    }
    */

    /*
    public function create() {
        $postsArr = [
            [
                'title' => 'title',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'img' => 'img',
                'likes' => 10,
                'is_published' => 1,
            ],
            [
                'title' => 'title a',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'img' => 'img a',
                'likes' => 20,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }
    */
    /*
    public function update() {
        $post = Post::find(1);

        $post->update([
            'title' => 'update title',
            'content' => 'update',
            'img' => 'update',
            'likes' => 100,
            'is_published' => 1,
        ]);

        dd('updated');
    }
    */
    
    public function delete() {
        /*  восстановления данных 
        $post = Post::withTrashed()->find(1);
        $post->restore();
        dd('restore');
        */
        

        $post = Post::find(1);

        $post->delete();
        dd('deleted');
    }

    // Комбинированные методы
    // firstOrCreate
    // updateOrCreate 

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'some title',
            'content' => 'some post',
            'img' => 'some img',
            'likes' => 1000,
            'is_published' => 1,
        ];

        /*
            если title = 'some title' существует в бд то мы получаем post
            если нет то мы создаем новый post
        */
        $post = Post::firstOrCreate([ 
            'title' => 'some title',
        ], $anotherPost);

        dump($post);
        dd('finished');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'update title',
            'content' => 'update post',
            'img' => 'update img',
            'likes' => 1000,
            'is_published' => 1,
        ];

        /*
            если title = 'update title' существует в бд то мы выполняем update
            если нет то мы создаем новый post
        */
        $post = Post::updateOrCreate([
            'title' => 'update title',
            ], $anotherPost);
        
        dump($post);
        dd('finished');
    }

    public function index() {
        $posts = Post::all();

        //dump(Tag::find(1)->posts);
        /*
            return view('posts', compact(posts));
        */
        
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create() {
        return view('post.create', [
            'categories' => Category::all(),
            'tags' =>  Tag::all()
        ]);
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        
        $post=Post::create($data);
        
        $post->tags()->attach($tags);
        return redirect()->route('posts.index');
    }

    public function show(Post $post) {
        //$post = Post::find($id);
        //$post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post) {
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' =>  Tag::all()
        ]);
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);
        
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
