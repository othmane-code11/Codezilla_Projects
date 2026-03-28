@extends("layouts.app")
@section("title")
Create
@endsection
@section("content")
<div class="container">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Posted BY</label>
            <select class="form-control" name="posted_by" id="exampleFormControlSelect1">
                <option>Othmane</option>
                <option>Yassine</option>
                <option>Zaid</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection