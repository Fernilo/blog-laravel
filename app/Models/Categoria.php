<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'create_at' , 'update_at'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($etiqueta) {
            $etiqueta->slug = Str::slug($etiqueta->nombre);
        });
    }
}
