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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $categories = Category::all();
        return view('pages.video.create-edit');
    }

    private function validation(Request $request) {

        $validator = Validator::make( $request->all(), [
            'title' => 'required|unique|max:100',
            'description' => 'required|unique|max:500',
            'link' => 'required|unique|max:100',
            'duration'=> 'required', 
        ]);
        
        return $validator;
       
    }

    /**
     * Cria um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {        

        $validator = $this->validation($request);

        $video = new Video;
        $this->save($video, $request);
        return redirect()->route('home'); 
    }

    /**
     * Atualiza um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $video = Video::where("id", $request->id)->first();
        $this->save($video, $request);
        return redirect()->route('home'); 
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

}
