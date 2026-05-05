@extends("layouts.app")
@section("title")
Create
@endsection
@section("content")
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" value="{{ old('title') }}" id="exampleFormControlInput1" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" value="{{ old('description') }}" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Posted By</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection