<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Listagem dos álbuns
    public function index()
    {
    	$albuns = \App\Album::orderBy('alb_id','DESC')
    	->join('album_capa', 'album.alb_cod', '=',
    			'album_capa.albc_alb_cod')->paginate(12);
        //dd($albuns);
        return view('galeria.albuns.index', compact('albuns'));
    }
    //Listagem das fotos dentro de cada álbum
    public function fotosAlbum($codAlbum)
    {
        $fotos = \App\AlbumFotos::where('albf_alb_cod',$codAlbum)
        ->join('album', 'album_fotos.albf_alb_cod', '=',
                'album.alb_cod')
        ->orderBy('album_fotos.albf_id','DESC')->paginate(50);
        $titulo = $fotos->first()->alb_titulo;
        return view('galeria.album_fotos.index', compact('fotos','titulo'));
    }

}
