<?php

namespace App\Helpers;

use App\Models\Photo;
use App\Models\Size;

class ExternalApiHelper
{
    public function requestAPI(): string
    {
        $list = $this->search();

        if ($list->stat == 'ok'){

            $newPhoto = new Photo();
            $newPhoto->page = $list->photos->page;
            $newPhoto->pages = $list->photos->pages;
            $newPhoto->perpage = $list->photos->perpage;
            $newPhoto->total = $list->photos->total;
            $newPhoto->photo_details = $list->photos->photo;
            $newPhoto->save();

            foreach ($list->photos->photo as $photo){

                $listSizes = $this->getSizes($photo->id);
                $size = new Size();
                $size->size_details = $listSizes->sizes->size;
                $size->canblog = $listSizes->sizes->canblog;
                $size->canprint = $listSizes->sizes->canprint;
                $size->candownload = $listSizes->sizes->candownload;
                $size->photo_id = $photo->id;
                $size->save();
            }
            return '<a href="'.route('galleryIndex').'">Aceder à galeria</a>';
        }else{
            return 'erro';
        }
    }

    public function search()
    {
        $params = array(
            'api_key'	=> env('FLICKR_API_KEY'),
            'method'	=> 'flickr.photos.search',
            'tags'	=> 'kitten',
            'safe_search' => '1',
            'page' => '26',
            'per_page' => '10',
            'format'	=> 'json',
            'nojsoncallback' => '1',
        );
        $encoded_params = array();

        foreach ($params as $k => $v){
            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }
        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
        return json_decode($rsp);
    }

    public function getSizes($photo_id)
    {
        $params = array(
            'api_key'	=> env('FLICKR_API_KEY'),
            'photo_id'  => $photo_id,
            'method'	=> 'flickr.photos.getSizes',
            'format'	=> 'json',
            'nojsoncallback' => '1',
        );
        $encoded_params = array();

        foreach ($params as $k => $v){
            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }
        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
        return json_decode($rsp);
    }

    public static function bar(){
        return app(ExternalApiHelper::class)->requestAPI();
    }
}
