<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    public function get(): ?JsonResponse
    {
        if(!Auth::check()){
            return null;
        }

        $albums = Album::query()->where('user_id', '=', Auth::id())->get();
        return response()->json($albums);
    }

    public function create(AlbumRequest $request): ?JsonResponse
    {
        if(!Auth::check()){
            return null;
        }

        $data = $request->collect();

        $album = new Album([
            'user_id' => Auth::id(),
//            'album_id',
//            'cover',
            'name' => $data['name'],
            'description' => $data['description'],
            'rights' => $data['rights'],
        ]);

        $save = $album->save();

        $arrData = [];

        if($save){
            $arrData[] = 'Новый альбом успешно создан';
        }else{
            $arrData[] = 'Возникли проблемы при создании нового альбома. Попробуйте еще раз.';
        }
        return response()->json(['message' => $arrData, 'result' => $save]);
    }
}
