@extends('layouts.galeria')
@section('content')

<h1>Photos <img src="{{url('/images/logo.png')}}" alt="Ícone de uma câmera fotográfica" > Gallery</h1>

<p class="page-description text-center">Uma Galeria De Fotos Simples</p>

<div class="tz-gallery">

    <div class="row">

        @if (count($albuns)>0)
        @foreach ($albuns as $album)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="{{url('/album/')}}/{{$album->alb_cod}}">
                    <img src="{{url('/albuns/')}}/{{$album->alb_pasta}}/{{$album->albc_img}}" alt="Park">
                </a>
                <div class="caption">
                    <p>{{$album->alb_titulo}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            {{$albuns->render()}}
        </div>
    </div>

</div>

@stop