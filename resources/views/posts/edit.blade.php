@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{route('posts.update', $post->id)}}" method="post">
            @csrf
            @method('put')
            @include('posts._form')
            <input class="btn btn-primary float-right" type="submit" value="Edit">
        </form>
    </div>
</div>
@endsection
