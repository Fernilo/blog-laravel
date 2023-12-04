<?php

namespace App\Listeners;

use App\Events\PostSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class OptimezePostImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostSaved  $event
     * @return void
     */
    public function handle(PostSaved $event)
    {
        $image = Image::make(Storage::get($event->post->image->url))
            ->widen(600)
            ->limitColors(255)
            ->encode();

        Storage::put($event->post->image->url, (string)$image);
    }
}
