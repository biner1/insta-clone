@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100" alt="image">
        </div>

        <div class="col-4">
            <div>

                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" alt="image" class='rounded-circle w-100' style="max-width: 40px;">
                    </div>
    
                    <div class="p-3">
                       <a class="text-decoration-none text-dark" href="/profile/{{$post->user->id}}"><b>{{$post->user->username }}</b></a>
                    </div>
                    <a href="#">Follow</a>
                </div>
                

                <hr>

                <p><span><a class="text-decoration-none text-dark" href="/profile/{{$post->user->id}}">
                    <b>{{$post->user->username }}</b></a></span> {{$post->caption}}
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
