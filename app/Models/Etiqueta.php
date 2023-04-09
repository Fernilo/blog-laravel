<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Etiqueta extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'create_at' , 'update_at'];

    public function posts() {
        return $this->belongsToMany(Post::class , 'posts_etiquetas' , 'etiqueta_id' , 'post_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($etiqueta) {
            $etiqueta->slug = Str::slug($etiqueta->nombre);
        });
    }
}
