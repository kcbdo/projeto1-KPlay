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
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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

        $videos= Video::where('title', 'like', '%'.$pesquisar.'%')
        ->orWhere("description", 'like', '%'.$pesquisar.'%')
        ->with('categories')
        ->orderBy('id')
        ->paginate(10);
        
        $data = [
            'videos' => $videos,
            'pesquisar' => $pesquisar,
        ];
        
        return view('pages.video.video', $data);
    }


    public function create() {
        
        $categories = Category::all(); 
        
        return view('pages.video.create-edit', [
            'video' => new Video(), 
            'categories' => $categories
        ]);
    }

    public function edit(int $id) {
        
        $video = Video::find($id);
        
        $categories = Category::all();

        return view('pages.video.create-edit', [
            'video' => $video,
            'categories' => $categories
        ]);
    }

    /**
     * Cria um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {        
        $validator = $this->validation($request);
        
        if (!$validator->fails()) {
            $video = new Video;
            $this->save($video, $request);
            return redirect()->route('video.index'); 
        }

        $error = $validator->errors()->first();
        
        return response("Não foi possível criar o vídeo: $error");
    }

    /**
     * Atualiza um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = $this->validation($request);
        
        if (!$validator->fails()){
            $video = Video::where("id", $request->id)->first();
            // $video = Video::find($request->id);
            $this->save($video, $request);
            return redirect ()-> route('video.index');
        }
        
        $error = $validator->errors()->first();

        return response ("Não foi possível atualizar o vídeo: $error");
    }

    /**
     * Salva o vídeo
     * @param \App\Models\Video $video
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function save(Video $video, Request $request): void {
        $video->title = $request->title;
        $video->description = $request->description;
        $video->link = $request->link;
        $video->duration = $request->duration;
        $video->user_id = 1;
        $video->save();  

        if ($request->categories) {
            DB::table('categories_videos')->where('video_id', $video->id)->delete();
             foreach ($request->categories as $categoryId) {
                 DB::table('categories_videos')->insert([
                    'video_id' => $video->id,
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
            ]);
        }
    }   else 
        {
            DB::table('categories_videos')->where('video_id', $video->id)->delete();
        }
            
            // TODO refazer de forma leiga (criar e remover cada registro de categories_videos)
            //$video->categories()->sync($request->categories);
        
    }
    public function delete (int $id) {
        $video = Video::find($id);
        if ($video){
            DB::table('categories_videos')->where('video_id', $id)->delete();
            $video->delete();
            return redirect()->route('video.index')->with('sucess', 'Vídeo deletado com sucesso!');
        }

    }

    private function form(Video $video) {
        $categories = Category::all();
        
        $data = [
            'videos' => $video,
            'categories'=> $categories, 
        ];

        

        return view ('pages.video.create-edit', $data) ;
    }

    private function validation(Request $request) {

        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'link' => 'required|string|max:100',
            "duration" => "required",
            'description' => 'required|string|max:500',
            "user_id" => "nullable|integer|exists:users,id"
        ], [
            'title.max' => 'O título não pode ter mais que 100 caracteres.',
            'description.max' => 'A descrição não pode ter mais que 500 caracteres.',
            'link.max' => 'O link não pode ter mais que 255 caracteres.',
        ]);

        return $validation;
    }

}
