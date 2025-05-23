<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use  Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest; 




class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pesquisar= $request->pesquisar; 

        $videos= Video::where('title', 'ilike', '%'.$pesquisar.'%')
        ->orWhere("description", 'ilike', '%'.$pesquisar.'%')
        ->with('categories')
        ->paginate(10);
        
        $data = [
            'videos' => $videos,
            'pesquisar' => $pesquisar,
        ];
        
        return view('pages.video.video', $data);
    }


    public function create() {
        
        return $this->form(new Video());
    }

    public function edit(int $id) {
        return view ('pages.video.creat-edit'); 
        return $this->form();
    }

    /**
     * Cria um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request): void
    {        

        $validator = $this->validation($request);

        $video = new Video;
        $this->save($video, $request);
    }

    /**
     * Atualiza um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request): void
    {
        $validator = $this->validation($request);

        $video = Video::where("id", $request->id)->first();
        $this->save($video, $request);
    }

    /**
     * Salva o vídeo
     * @param \App\Models\Video $video
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function save(Video $video, Request $request): void {
        $video->title = $request->titulo;
        $video->description = $request->descricao;
        $video->link = $request->link;
        $video->duration = $request->duration;
        $video->user_id = 1;
        $video->save();  
         

    }

    private function form(Video $video) {
        $data = [
            'videos' => $video,
        ];

        

        return view ('pages.video.create-edit', $data) ;
    }

    private function validation(Request $request) {

        $request->validate([
        'titulo' => 'max:100',
        'descricao' => 'max:500',
        'link' => 'max:255',
    ], [
        'titulo.max' => 'O título não pode ter mais que 100 caracteres.',
        'descricao.max' => 'A descrição não pode ter mais que 500 caracteres.',
        'link.max' => 'O link não pode ter mais que 255 caracteres.',
    ]);
       
    }

}
