@extends('layout.app')
@section('content')
    <h1>Galeria de imagens</h1>

    <div class="row">
        <div class="container">
            @foreach ($gallery as $photo)
                <div class="test_box box-01 grid-item" style="width: 100%">
                    <div class="inner" style="background-image: url('{{$photo['size_details']->source}}')">
                        <a href="{{$photo['size_details']->url}}" class="test_click" target="_blank">
                            <div class="flex_this">
                                <h3 class="test_title">
                                    {{$photo['photo_title']}}
                                </h3>
                                <span class="test_link">Link</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
