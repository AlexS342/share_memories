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
        $responseData = [];
        $responseData['quantityFiles'] = count($request->file('files'));
        $responseData['quantityDB'] = 0;
        $responseData['quantityStore'] = 0;

        $data = $request->all();

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

            $save = $fileModel->save();

            if($save){
                $responseData['quantityDB']++;
            }

            $path = Storage::putFile('', $file);

            if($path){
                $responseData['quantityStore']++;
            }

            //TODO добавить обработку ошибок при сохранении файла и записи в БД

        }

        $arrData = [];

        $arrData['message'][] = 'Получено на сервер ' . $responseData['quantityFiles'] . ' файлов';
        $arrData['message'][] = 'Записано в базу данных информация о ' . $responseData['quantityDB'] . ' файла';
        $arrData['message'][] = 'Сохранено в хранилище ' . $responseData['quantityStore'] . ' файлов';

        if($responseData['quantityFiles'] == $responseData['quantityDB'] && $responseData['quantityDB'] == $responseData['quantityStore']){
            $arrData['result'] = true;
        }else{
            $arrData['result'] = false;
        }
        return response()->json($arrData);
    }
}
