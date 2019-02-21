<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable =[
       'title','body','user_id'
   ]; 

   public static function published(){
      return  self::where('published',1)->get();

   }
   public static function drafts(){
      return  self::where('published',0)->get();
       
       
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');//ili ('User');
    }

    public function comments(){
        return $this->hasMany(Comment::class); //jedan post ima vise komentara
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
