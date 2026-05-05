@extends("layouts.app")
@section("title")
show
@endsection
@section("content")
<div class="container mt-5">
    @if (session()->has("message"))
        <div class="alert alert-success">
            {{ session()->get("message") }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post["title"] }}</h5>
            <p class="card-text">Description: {{$post["description"]}}</p>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Creator Name: {{ $post->user ? $post->user->name : 'Not found' }}</h5>
            <p class="card-text">Creator Email: {{$post->user ? $post->user->email : 'Not found'}}</p>
        </div>
    </div>
</div>
@endsection