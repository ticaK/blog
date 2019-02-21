<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag){
        $posts = $tag->posts()->paginate(10); //daj nam postove od proslijedjenog taga
        return view('posts.index',compact('posts'));

    }
}
