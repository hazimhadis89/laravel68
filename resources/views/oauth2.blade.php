@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="my-2">
              <passport-clients></passport-clients>
            </div>
            <div class="my-2">
              <passport-authorized-clients></passport-authorized-clients>
            </div>
            <div class="my-2">
              <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</div>
@endsection
