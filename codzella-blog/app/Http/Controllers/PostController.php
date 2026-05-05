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
        request()->validate([
            "title" => "required",
            "description" => "required",
            "user_id" => "required|exists:users,id"
        ]);
        $post = [
            "title" => request()->title,
            "description" => request()->description,
            "user_id" => request()->user_id
        ];
        Post::create($post);
        session()->flash("message", "Post created successfully");
        return to_route('posts.index');
    }

    public function edit(Post $post) { // type hinting
        // $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', ["post" => $post, "users" => $users]);
    }

    public function update($id) {
        request()->validate([
            "title" => "required",
            "description" => "required",
            "user_id" => "required|exists:users,id"
        ]);

        $post = [
            "title" => request()->title,
            "description" => request()->description,
            "user_id" => request()->user_id
        ];
        Post::where("id", $id)->update($post);
        session()->flash("message", "Post updated successfully");
        return to_route('posts.show', $id);
    }

    public function destroy($id) {
        Post::findOrFail($id)->delete();
        session()->flash("message", "Post deleted successfully");
        return to_route("posts.index");
    }
}
