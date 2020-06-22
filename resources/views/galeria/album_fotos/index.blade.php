@extends('layouts.galeria')
@section('content')


<center><h2><a href="{{url('/')}}"><img src="{{url('/images/voltar.png')}}" alt="Voltar para a página inicial" title="Voltar"></a> {{$titulo}}</h2></center>

<div class="tz-gallery">

    <div class="row">
        @if (count($fotos)>0)
        @foreach ($fotos as $foto)
        <div class="col-sm-6 col-md-4">
            <a class="lightbox" href="{{url('/albuns/')}}/{{$foto->alb_pasta}}/{{$foto->albf_img}}">
                <img src="{{url('/albuns/')}}/{{$foto->alb_pasta}}/{{$foto->albf_img}}" alt="Park">
            </a>
        </div>
        @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            {{$fotos->render()}}
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>

@stop