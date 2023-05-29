@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        
    <div class="row">

        <div class="col-5 offset-3">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100" alt="image">
            </a>
        </div>
    </div>

    <div class="row pt-2 pb-4">

        <div class="col-5 offset-3">
            <div>


                <p><span><a class="text-decoration-none text-dark" href="/profile/{{$post->user->id}}">
                    <b>{{$post->user->username }}</b></a></span> {{$post->caption}}
                </p>
            </div>
        </div>

    </div>
    @endforeach

    <div class="row ">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
