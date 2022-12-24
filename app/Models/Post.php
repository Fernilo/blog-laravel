<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas() {
        return $this->belongsToMany(Etiqueta::class , 'posts_etiquetas' , 'post_id' , 'etiqueta_id');
    }

    public function image() {
        return $this->morphOne(Imagene::class,'imageable');
    }
}
