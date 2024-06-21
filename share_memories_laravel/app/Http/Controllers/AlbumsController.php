<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    public function create(AlbumRequest $request)
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
            return response()->json(['message' => $arrData, 'result' => $save]);
        }else{
            $arrData[] = 'Возникли проблемы при создании нового альбома. Попробуйте еще раз.';
            return response()->json(['message' => $arrData, 'result' => $save]);
        }


    }
}
