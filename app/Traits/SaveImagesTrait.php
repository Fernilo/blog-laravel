<?php
namespace App\Traits;

use App\Events\PostSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait SaveImagesTrait
{
    public function SaveImages(Request $request, object $object)
    {
        $url = Storage::put('images', $request->file('imagen'));

        if($object->image) {
            Storage::delete($object->image->url);

            $object->image->update([
                'url' => $url
            ]);
        } else {
            $object->image()->create([
                'url' => $url
            ]);
        }
        
        PostSaved::dispatch($object);
    }
}