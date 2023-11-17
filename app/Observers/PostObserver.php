<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        //Al correr los seeders no hay usuario autenticado y se asignan usuarios al azar
        //por lo tanto esto debe ser validado si se corre desde la consola o no
        if(! \App::runningInConsole()) {
            $post->usuario_id = auth()->user()->id;
        }

        $post->slug = Str::slug($post->nombre);
    }

    public function updating(Post $post)
    {
        $post->slug = Str::slug($post->nombre);
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image->url);
        }
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
