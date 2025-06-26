<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;




class PlaylistController extends Controller
{
    
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;

        $playlists = Playlist::where('title', 'like', "%$pesquisar%")
                    ->paginate(10); 

        return view('pages.playlists.playlists', compact('playlists'));
    }
    public function create()
    {
        $videos = Video::all();

        return view('pages.playlists.create-edit-playlist', [
        'playlist' => new Playlist(),
        'videos' => $videos,
        ]);
    }
    public function edit(int $id)
    {
        $playlist = Playlist::find($id);

        if (!$playlist) {
            return redirect()->route('playlists.index')
                ->with('error', 'Playlist não encontrada!');
        }

        $videos = Video::all();

        return view('pages.playlists.create-edit-playlist', [
            'playlist' => $playlist,
            'videos' => $videos,
        ]);
    }
    public function show($id)
    {
        $playlist = Playlist::with('videos')->find($id);

        if (!$playlist) 
        {
            return redirect()->route('playlists.index')->with('error', 'Playlist não encontrada.');
        }

        return view('pages.playlists.view-playlist', compact('playlist'));
    }

    public function insert(Request $request)
    {
        $validator = $this->validation($request);

        if (!$validator->fails()) {
            $playlist = new Playlist;
            $this->save($playlist, $request);
            return redirect()->route('playlists.index');
        }

        $error = $validator->errors()->first();

        return response("Não foi possível criar a playlist: $error");
    }

    public function update(Request $request)
    {
        $validator = $this->validation($request);

        $playlist = Playlist::where("id", $request->id)->first();

        if (!$playlist) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Playlist não encontrada.');
        }

        if (!$validator->fails()) {
            $this->save($playlist, $request);
            return redirect()->route('playlists.index');
        }

        $error = $validator->errors()->first();

        return response("Não foi possível atualizar a playlist: $error");
    }

    public function delete(int $id)
    {
        $playlist = Playlist::find($id);

        if ($playlist) {
            DB::table('videos_playlists')->where('playlist_id', $id)->delete();
            $playlist->delete();

            return redirect()->route('playlists.index')->with('success', 'Playlist deletada com sucesso!');
        }

        return redirect()->route('playlists.index')->with('error', 'Playlist não encontrada.');
    }

    /**
     * Validação dos dados
     */
    private function validation(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'is_public' => 'required|boolean',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título não pode ter mais que 100 caracteres.',
        ]);
    }

    /**
     * Salva a playlist e vincula vídeos
     */
    private function save(Playlist $playlist, Request $request): void
    {
        $playlist->title = $request->title;
        $playlist->is_public = $request->is_public;
        $playlist->save();

        // Gerenciar relação com vídeos (tabela playlist_video)
        if ($request->videos) {
            DB::table('videos_playlists')->where('playlist_id', $playlist->id)->delete();

            foreach ($request->videos as $videoId) {
                DB::table('videos_playlists')->insert([
                    'playlist_id' => $playlist->id,
                    'video_id' => $videoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            DB::table('videos_playlists')->where('playlist_id', $playlist->id)->delete();
        }
    }


}