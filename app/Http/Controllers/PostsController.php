<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Http\Requests\CreateCommentRequest;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();// Post je ime modela
        $posts = Post::published(); //da prikazuje samo objavljene postove

        return view('posts.index',compact('posts')); //nasa promjenjiva ce se u view zvati post
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

        Post::create($request->all());
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
        //
    }

    public function addComment(CreateCommentRequest $request,$id)
    {
        Comment::create([
            'post_id'=>$id,
            'author'=>$request->author,
            'text'=>$request->text
        ]);
        return redirect()->back();
    }
}
