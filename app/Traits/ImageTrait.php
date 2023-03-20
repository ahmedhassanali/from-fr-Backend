<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{


    public function storeImage($path, $image)
    {
        $imageExtension = $image -> getClientOriginalExtension();
        $imageName = time().'.'.$imageExtension;
        $image->storeAs($path,$imageName,'images');
        return $path.'/'.$imageName;
    }


    public function updateImage($imageName,$image,$path)
    {
        $this->deleteImage($imageName);
        return $this->storeImage($path,$image);
    }

    public function deleteImage($imageName)
    {
        Storage::disk('images')->delete($imageName);
        return true;
    }
}
