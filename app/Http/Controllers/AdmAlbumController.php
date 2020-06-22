<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use Session;
use Response;

class AdmAlbumController extends Controller
{
	function index()
	{
		$albuns = \App\Album::orderBy('alb_id','DESC')->get();
		return view('adm.albuns', compact('albuns'));
	}

	public function carregarDadosAlbum($id){
		$data = \App\Album::findOrFail($id);
		return Response::json($data);
	}

	public function apagarAlbum($id){
		$album = \App\Album::findOrFail($id);        

		DB::beginTransaction();

		try {
			$album->deleted_at = date("Y-m-d H:i:s");
			$album->update();
			DB::commit();

		} catch (\Exception $e) {
			DB::rollback();

		}

	}
}
