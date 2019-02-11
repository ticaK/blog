
    

    
  
    
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
</div>
    
    @endsection
    