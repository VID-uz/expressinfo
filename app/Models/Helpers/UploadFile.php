<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 14:07
 */

namespace App\Models\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function uploadFile($image)
    {
        if($image == null) return;

        $this->removeImage();
        $filename = $this->generateFilename($image->extension());
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if($this->image != null)
            Storage::delete('uploads/' . $this->image);
    }

    public function getFileType()
    {
        $path = public_path() . '/uploads/' . $this->image;

        if(file_exists($path))
        {
            return explode('/', File::mimeType($path))[0];
        }else
        {
            return null;
        }
    }

    public function getUrl()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return '/uploads/' . $this->image;
        }else
        {
            return null;
        }
    }

    public function getFileName()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return explode('/', File::name($path));
        }else
        {
            return null;
        }
    }

    public function getFileSize()
    {
        $path = public_path() . '/uploads/' . $this->image;
        if(File::exists($path))
        {
            return File::size($path);
        }else
        {
            return null;
        }
    }
}