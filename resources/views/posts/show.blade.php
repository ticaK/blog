
    

    
  
    
    @extends('layouts.master')

    @section('title', $post->title)
    {{-- {{-- {{$post->title}} -- ovo samo treba end section }} --}}
 
    
    
    
    @section('content')

    <div>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p> <hr>
    @foreach($post->comments as $comment)
    <div class="p-4 alert alert-success">
        {{$comment->text}}
    </div>
    @endforeach


    <div class="container">
    <form method = "POST" action = "{{route('posts.comment',['id'=>$post->id])}}"> 
       @csrf
        <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Author</label>
                <input
                  id="text"
                  name="author"
                  type="text"
                  class="form-control"
                />
              </div>
        
              <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Content</label>
                <textarea
                  id="textarea"
                  name="text"
                  cols="40"
                  rows="5"
                  class="form-control"></textarea>
              </div>
          </div>

          <div class="form-group row">
                <div class="offset-4 col-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>

    </form>
    
    @endsection
    