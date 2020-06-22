@extends('layouts.app')
@section('content')
<div class="container">    
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">ÁLBUNS:</h3>
    </div>
    <hr/>
    <div class="panel-body">
    	<ul>    		
    		@if (count($albuns)>0)
    		@foreach ($albuns as $album)
    		<li class="list-albuns">
    			{{$album->alb_titulo}} | <a href="" class="apagarAlbum" data-id="{!! $album->alb_id !!}" data-target="#apagarAlbum" data-toggle="modal">Deletar</a>
    		</li>
    		<hr/>
    		@endforeach
    		@else
    		<h4>Você ainda não criou nenhum álbum.</h4>
    		@endif
    	</ul>
    </div>
</div>
@include('adm.apagar_album')
</div>
@stop