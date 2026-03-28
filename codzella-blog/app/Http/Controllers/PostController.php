<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $allPosts = Post::all();
        return view('posts.index', ["posts" => $allPosts]);
    }

    public function show ($postid) {
        $singlePost = Post::find($postid);
        return view('posts.show', ['post' => $singlePost]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $posts = [
            "title" => request()->title,
            "description" => request()->description,
            "posted_by" => request()->posted_by
        ];
        Post::create($posts);
        return to_route('posts.index');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', ["post" => $post]);
    }

    public function update($id) {
        $post = [
            "title" => request()->title,
            "description" => request()->description,
            "posted_by" => request()->posted_by
        ];
        Post::where("id", $id)->update($post);
        return to_route('posts.show', $id);
    }

    public function destroy($id) {
        Post::findOrFail($id)->delete();
        return to_route("posts.index");
    }
}
