@extends('layouts.app')
@section('content')
<div class="container">    
   <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Criar Álbum De Fotos</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">            
            @csrf
            <div class="form-group row">
                <label for="titulo-album" class="col-sm-3 col-form-label" align="right">Título do Álbum:</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" maxlength="34" id="titulo-album" name="titulo-album" required/>
              </div>
              </div>
              <div class="row">
                <label for="file" class="col-sm-3 col-form-label" align="right">Escolher Foto De Capa:</label>
                <div class="col-md-6">
                    <input type="file" name="file-capa" id="file-capa" accept="image/*" required/>
                </div>
            </div>
            <div class="row">
                <label for="file" class="col-sm-3 col-form-label" align="right">Escolher Demais Fotos:</label>
                <div class="col-md-6">
                    <input type="file" name="file[]" id="file" accept="image/*" multiple required/>
                </div>
                <div class="col-md-3">
                    <input type="submit" name="upload" value="Criar album e fazer upload" class="btn btn-success btn-criar-album" />
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center load"> 
            <img class="img-load" src="{{ asset('images/preloader.gif') }}">
        </div>
    </div>
</div>

</div>
@stop