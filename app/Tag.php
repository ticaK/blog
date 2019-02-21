<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    // protected $table = 'tagovi'; ovo bismo pisali da se tabela ne zove tags
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    
}
