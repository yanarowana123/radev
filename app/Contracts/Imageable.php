<?php


namespace App\Contracts;


use Illuminate\Http\UploadedFile;

interface Imageable
{
    public function uploadImage(UploadedFile $file):string;
}
