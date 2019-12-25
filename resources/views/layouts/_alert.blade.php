@if(Session::get('success') || Session::get('error'))
    <div class="row">
        <div class="col">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>
            @elseif (Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>Success:</strong> {{ Session::get('error') }}
                </div>
            @endif
        </div>
    </div>
@endif
