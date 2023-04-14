<?php

namespace App\Http\Controllers;


use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{

    public function index()
    {
        $photosDB = Photo::all();

        $gallery = array();
        foreach ($photosDB as $photo) {
            foreach ($photo->photo_details as $photo_detail){
                $sizeTeste = DB::table('sizes')->where('photo_id','like',$photo_detail['id'])->first();
                $size_details = json_decode($sizeTeste->size_details);
                foreach ($size_details as $detail){
                    if ($detail->label === "Medium 640"){
                        $size_details = $detail;
                    }
                }
                $gallery[] = [
                    "photo_id"=>$photo_detail['id'],
                    "page"=>$photo['page'],
                    "pages"=>$photo['pages'],
                    "perpage"=>$photo['perpage'],
                    "total"=>$photo['total'],
                    "photo_owner"=>$photo_detail['owner'],
                    "photo_secret"=>$photo_detail['secret'],
                    "photo_server"=>$photo_detail['server'],
                    "photo_farm"=>$photo_detail['farm'],
                    "photo_title"=>$photo_detail['title'],
                    "photo_ispublic"=>$photo_detail['ispublic'],
                    "photo_isfriend"=>$photo_detail['isfriend'],
                    "photo_isfamily"=>$photo_detail['isfamily'],
                    "size_canblog"=> $sizeTeste->canblog,
                    "size_canprint"=> $sizeTeste->canprint,
                    "size_candownload"=> $sizeTeste->candownload,
                    "size_details"=> $size_details,
                ];
            }

        }

        return view('gallery.index', compact('gallery'));
    }

}
