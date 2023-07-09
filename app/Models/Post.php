<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Categoria;//No hace falta , está dentro del mismo namespace pero para que quede claro

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'create_at' , 'update_at'];

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

    protected static function boot() {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->titulo);
        });
    }
}
