<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $allPosts = Post::all();
        return view('posts.index', ["posts" => $allPosts]);
    }

    public function show (Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    public function create () {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store() {
        $post = [
            "title" => request()->title,
            "description" => request()->description,
            "posted_by" => request()->posted_by
        ];
        Post::create($post);
        return to_route('posts.index');
    }

    public function edit(Post $post) { // type hinting
        // $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', ["post" => $post, "users" => $users]);
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
