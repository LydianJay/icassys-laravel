
@props(['title'])
<div class="card-header">
    @if (session('status'))
        <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('status')['msg'] }}
        </div>
    @endif



    <h5>{{$title}}</h5>
    {{ $slot }}

</div>