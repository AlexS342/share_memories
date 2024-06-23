<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    public function get()
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

        $id = Auth::id();
        $data = $request->collect();

        $album = Album::factory()->make([
            ...$data, 'user_id' => $id
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
