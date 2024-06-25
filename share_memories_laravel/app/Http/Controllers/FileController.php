<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function add(FileRequest $request): JsonResponse
    {
        $data = $request->all();

        $files = [];
        foreach ($request->file('files') as $key => $file)
        {
//            if(!$file->isValid()){
                //TODO вернуть сообщение о неудачно загруженных файлах
//            }

            $fileModel = new File([
                'user_id' => Auth::id(),
                'album_id' => $data['album_id'],
                'name' => explode('.', $file->getClientOriginalName())[0],
                'description' => $data['description'],
                'rights' => $data['rights'],
                'hash_name' => $file->hashName(),
                'size' => $file->getSize(),
                'type' => explode('/', $file->getClientMimeType())[0],
                'expansion' => explode('/', $file->getClientMimeType())[1],
            ]);

            $fileModel->save();

            $files[] = $fileModel;

            $path = Storage::putFile('', $file);

            //TODO добавить обработку при сохранении файла и записи в БД

        }
        return response()->json($files);
    }
}
