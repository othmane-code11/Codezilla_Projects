<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $allPosts = [
            ['id' => 1, "title" => "PHP", "Posted_by" => "Othmane", "Created_at" => "2022-10-10 09:00:00"],
            ['id' => 2, "title" => "JS", "Posted_by" => "YAHYA", "Created_at" => "2022-10-10 09:00:00"],
            ['id' => 3, "title" => "PYTHON", "Posted_by" => "YOUSSEF", "Created_at" => "2022-10-10 09:00:00"]
        ];
        return view('index', ["posts" => $allPosts]);
    }

    public function show ($postid) {
        $singlePost = ['id' => 1, "title" => "PHP", "Posted_by" => "Othmane", "Created_at" => "2022-10-10 09:00:00", 'description' => 'This is a PHP description'];
        return view('show', ['post' => $singlePost]);
    }
}
