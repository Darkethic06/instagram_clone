<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FileService
{
    public function updateFile($model, $request, $type)
    {
        if (!empty($model->file)) {
            $currentFile = public_path() . $model->file;

            if (file_exists($currentFile) && $currentFile != public_path() . '/user-placehlder.png') {
                unlink($currentFile);
            }
        }
        $file = null;

        // $manager = new ImageManager::Driver();
        if ($file === 'user') {
            $file = ImageManager::imagick()->read($request->file('file'));
            $file = $file->resize(400, 400);
        } else {
            $file = ImageManager::imagick()->read($request->file('file'));
        }
        $ext = $request->file('file');
        $extension = $ext->getClientOriginalExtension();
        $name = time() . '.' . $extension;
        $file->save(public_path() . '/storage/file/' . $name);
        $model->file = '/storage/file/' . $name;

        return $model;
    }
}
