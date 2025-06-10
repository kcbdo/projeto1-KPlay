<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Video; 
use Illuminate\Http\Response; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.categories.categories'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = Video::all(); 
        
        return view('pages.categories.create-edit-category', [
            'categories' => new Category(), 
            'video' => $video
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {        
        $validator = $this->validation($request);
        
        if (!$validator->fails()) {
            $category = new Category;
            // $this->save($category, $request);
            return redirect()->route('categories.index'); 
        }

        $error = $validator->errors()->first();
        
        return response("Não foi possível criar a categoria: $error");
    }
    private function validation(Request $request) {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ], [
            'name.max' => 'O nome não pode ter mais que 100 caracteres.',
        ]);

        return $validation;
    }

}

