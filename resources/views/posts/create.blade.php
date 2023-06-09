@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
       
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2> Add New Post</h2>
                 </div>

                <div class="form-group row">
                    <label for="caption" class="col-form-label">Image Caption</label>
                  
                    <input id="caption" type="text" 
                    class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
    
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group row">
                    <label for="image" class="col-form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
        
                    @error('image')
                    <div></div>
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

               <div class="row pt-4 col-2">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
                
            </div>
        </div>
    </form>

</div>
@endsection
