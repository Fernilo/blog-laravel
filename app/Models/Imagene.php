<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Imagene extends Model
{
    use HasFactory;

    //Relacion polimorfica(una misma tabla tiene nexo con trablas diferentes)

    public function imageable(){
        return $this->morphTo();
    }
}
