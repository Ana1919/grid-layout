<?php

namespace App\Http\Controllers;


use App\Models\Photo;

class ImagesController extends Controller
{

    public function index()
    {
        $photosDB = Photo::all();

        return view('gallery.index', compact('photosDB'));
    }

}
