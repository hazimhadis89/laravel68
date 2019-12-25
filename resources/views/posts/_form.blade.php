<div class="my-2 card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{$post ? $post->title : ''}}" required>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- xx -->
        <textarea class="form-control" name="body" placeholder="Post Body" rows="5" required>{!!$post ? $post->body : ''!!}</textarea>
    </div>
</div>
