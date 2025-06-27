<?php

namespace App\Http\Controllers;
use App\Models\Playlist;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use FFMpeg;




class VideoController extends Controller
{
    
    public function index(Request $request)
    {
        $pesquisar= $request->pesquisar; 

        $videos= Video::getVideos($pesquisar); 
        
        $data = [
            'videos' => $videos,
            'pesquisar' => $pesquisar,
        ];
        
        return view('pages.video.video', $data);
    }


    public function create() 
    {
        $video = new Video();
        return $this->form($video);
    }

    public function edit(int $id) 
    {
        $video = Video::find($id);

        if (!$video)
        {
            return redirect()-> route('video.index')
            ->with ('error', 'Vídeo não encontrado!'); 
        } 
        $categories = Category::all();
        return $this->form($video);
    }

    /**
     * Cria um vídeo
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {        
        $validator = $this->validation($request);
        
        if (!$validator->fails()) 
        {
            $video = new Video;
            $this->save($video, $request);
            return redirect()->route('video.index')
                ->with('success', 'Vídeo criado com sucesso!');
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
        
        $video = Video::where("id", $request->id)->first();
    
        if (!$video) 
        {
            return redirect()->back()
            ->withInput()
            ->with('error', 'Vídeo não encontrado.');
        }
        if (!$validator->fails()){
            $this->save($video, $request);
            return redirect ()-> route('video.index');
        }
        $error = $validator->errors()->first();
        return response ("Não foi possível atualizar o vídeo: $error");
    }

     public function delete (int $id) 
    {
        
        $video = Video::find($id);
        if ($video)
        {
            DB::table('categories_videos')->where('video_id', $id)->delete();
            $video->delete();
            return redirect()->route('video.index')->with('success', 'Vídeo deletado com sucesso!');
        }

    }
    /**
     * Salva o vídeo || UTILIZAR SYNC PARA CATEGORIAS
     * @param \App\Models\Video $video
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function save(Video $video, Request $request): void 
    {
        $video->title = $request->title;
        $video->description = $request->description;
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('videos', 'public');
            $video->thumbnail = $path;
        }        
        $video->save(); 
        if ($request->categories) 
        {
            DB::table('categories_videos')->where('video_id', $video->id)->delete();
            foreach ($request->categories as $categoryId) 
            {
                DB::table('categories_videos')->insert([
                    'video_id' => $video->id,
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        } else 
        {
            DB::table('categories_videos')->where('video_id', $video->id)->delete();
        }
    }
   

    private function form(Video $video) 
    {
        $categories = Category::all();
        
        $data = 
        [
            'video' => $video,
            'categories'=> $categories, 
        ];
        return view ('pages.video.create-edit', $data) ;
    }

    private function validation(Request $request) {

        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "duration" => 'required',
            'description' => 'required|string|max:500',
            "user_id" => "nullable|integer|exists:users,id"
        ], [
            'title.max' => 'O título não pode ter mais que 100 caracteres.',
            'description.max' => 'A descrição não pode ter mais que 500 caracteres.',
            'thumbnail.max' => 'O tamanho máximo do thumbnail é de 2MB.',
        ]);

        return $validation;
    }

}
