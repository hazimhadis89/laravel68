@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{route('posts.store')}}" method="post">
            @csrf
            @include('posts._form')
            <input class="btn btn-primary float-right" type="submit" value="Create">
        </form>
    </div>
</div>
@endsection
