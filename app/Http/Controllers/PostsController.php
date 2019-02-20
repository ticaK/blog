<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Http\Requests\CreateCommentRequest;

use App\Mail\CommentReceived;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['only'=>['create','store']]);//umjesto auth moze niz middleware
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index',compact('posts')); 
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); //iz foldera posts metoda create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ovdje cuvamo post
        // Post::create([
        //     'title'=>$request->title,
        //     'body'=>$request->body
        // ]); ovo nije najbolji nacin, ako imamo mnogo polja

            $request->validate([
                'title'=>'required',
                'body'=>'required'
               
            ]);
            $post = Post::create(
                array_merge(
                $request->all(),
                ['user_id'=>auth()->user()->id]
                )
            );
        

        return redirect('/posts');
        // return redirect(route('posts.index')); moze i ovako

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //    $post = Post::findOrFail($id); //ima i samo find
        return view('posts.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();

    }

    public function addComment(CreateCommentRequest $request,$id)
    {
        $comment = Comment::create([
            'post_id'=>$id,
            'author'=>$request->author,
            'text'=>$request->text
        ]);

        if($comment->post->user){
            \Mail::to($comment->post->user)->send(new CommentReceived(
                $comment->post, $comment
            ));
        }
        
        return redirect()->back();
    }
}
