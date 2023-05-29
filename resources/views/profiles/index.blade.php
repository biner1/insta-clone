@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-5 px-5">
            <img class="rounded-circle" src="{{$user->profile->profileImage()}}" width="150px" height="150px" alt="hello">

        </div>

        <div class="col-9 pt-5 px-3">

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <div class="h4">{{ $user->username}}</div>

                    
                    <button class="btn btn-primary mx-4" onclick="follow()" id="follow_button">
                    @if ($follows)
                        Unfollow
                    @else
                        Follow
                    @endif
                    </button>
                </div>

                @can('update', $user->profile)
                  <a href="/p/create">Add New Post</a>
                 @endcan
                
            </div>


            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div><strong> {{$postCount}} </strong> posts </div>
                <div class="px-5"><strong> {{$followersCount}} </strong> followers </div>
                <div><strong> {{$followingCount}} </strong> following </div>
            </div>
            @if (isset($user->profile))
            <div class="pt-3"><b>{{$user->profile->title}}</b></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="www.freecodecamp.org">{{$user->profile->url}}</a></div>
            @endif
        </div>
    </div>

    <div class="row pt-5">
    
    @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100" alt="image">
            </a>
        </div>
    @endforeach

    </div>

           
</div>

<script>
    async function follow(user){
        try{
            const response = await fetch("/follow/"+{{$user->id}},{
                method : 'post',
                headers : {
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json',
                    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            if(response.ok){
                
                if(document.getElementById("follow_button").innerHTML == "Follow"){
                    document.getElementById("follow_button").innerHTML = "Unfollow";
                }
                else{
                    document.getElementById("follow_button").innerHTML = "Follow";
                }

            }else if(response.status == 401){
                window.location.href = "/login";
            }

        } catch(error){
            console.log(error);
        }
    }

</script>

@endsection
