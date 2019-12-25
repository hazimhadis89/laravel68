@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('posts.create')}}" class="btn btn-primary">
                Create
            </a>
        </div>
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="my-2 card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="font-weight-bold">{{$post->title}}</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            @can('update', $post)
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-secondary">
                                Edit
                            </a>
                            @endcan
                            @can('delete', $post)
                                <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $post->id }}" action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {!!$post->body!!}

                    <br><br>
                    <span class="float-right">
                        posted by: {{optional($post->user)->name}}<br>
                        updated at: {{optional($post->updated_at)->diffForHumans(Carbon\Carbon::now())}}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
