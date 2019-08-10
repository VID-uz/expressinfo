<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 08.08.2019
 * Time: 13:57
 */

namespace App\Models\Helpers;


use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    public function uploadImage($image)
    {
        if(isset($this->logo_url))
        {
            if($this->logo_url != null)
            {
                $url = $this->logo_url;
                $filename = str_random(10) . '.png';
                $path = public_path() . '/uploads/' . $filename;
                $ch = curl_init($this->logo_url);
                $fp = fopen($path, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                $this->image = $filename;
                $this->logo_url = '';
                $this->save();
            }
        }
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

    public function getImage()
    {
        if(isset($this->logo_url))
        {
            if($this->logo_url != null || $this->logo_url != '')
            {
                return $this->logo_url;
            }
        }
        if($this->image != null)
            return '/uploads/' . $this->image;
        else
            return '';
    }

    public function generateFilename($extension)
    {
        return str_random(10) . '.' . $extension;
    }
}