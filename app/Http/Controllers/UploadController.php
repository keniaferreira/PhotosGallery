<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use Session;

class UploadController extends Controller
{
	function index()
	{
		return view('adm.file_upload');
	}

	function upload(Request $request)
	{
		$messages = [];
        $validatorFls = new \App\Http\Requests\UploadFotosRequest();
        if(!$validatorFls->validar($request)){
            $errors = $validatorFls->messages();
            foreach ($errors as $error => $err) {
                array_push($messages, $err[0]);
            }
            return redirect('/')->with('error', [                
                'message' => $messages
            ]);
        }
		set_time_limit(0);
		ini_set('memory_limit','2048M');
		$lastAlbInsert = \App\Album::orderBy('alb_id','DESC')->withTrashed()->first();
		DB::beginTransaction();

		try {

			$album = new \App\Album();
			$album->alb_cod = (isset($lastAlbInsert->alb_cod)) ? $lastAlbInsert->alb_cod + 1 : 1;
			$album->alb_titulo = $request['titulo-album'];
			$album->alb_pasta = rand() . '.' .str_replace(' ', '', (\App\DefaultFunctions::tirarAcentos($request['titulo-album'])));
			$album->save();

			$image_capa = $request->file('file-capa');
			$new_name = rand() . '.' . $image_capa->getClientOriginalExtension();
			$image_capa->move(public_path('albuns/'.$album->alb_pasta.'/'), $new_name);

			$capa = new \App\AlbumCapa();
			$capa->albc_alb_cod;
			$capa->albc_alb_cod = $album->alb_cod;
			$capa->albc_img = $new_name;
			$capa->save();

			$images = $request->file('file');
			foreach($images as $image)
			{
				$new_name = rand() . '.' . $image->getClientOriginalExtension();
				$image->move(public_path('albuns/'.$album->alb_pasta.'/'), $new_name);

				$image = new \App\AlbumFotos();
				$image->albf_alb_cod = $album->alb_cod;
				$image->albf_img = $new_name;
				$image->save();
			}

			DB::commit();
			return redirect('/')->with('success', [                
                'message' => ['Álbum Criado com sucesso!']
            ]);
		
			
		} catch (\Exception $e) {
			DB::rollback();
            return redirect('/')->with('error', [                
            	'message' => [$e->getMessage()]
            ]);
		}

	}
}
