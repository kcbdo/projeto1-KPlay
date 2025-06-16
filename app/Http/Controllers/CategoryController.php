<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Video; 
use Illuminate\Http\Response; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $pesquisar= $request->pesquisar; 
        $categories = Category::getCategories($pesquisar);

        return view('pages.categories.categories', ['categories' => $categories]); 
    }

    
    public function create()
    {
        return view('pages.categories.create-edit-category', [
            'categories' => new Category(), 
        ]);
    }
    
     public function edit(int $id) {
        
        $category = Category::find($id);

        if (!$category)
        {
            return redirect()-> route('categories.index')
            ->with ('error', 'Categoria não encontrada!'); 
        }
        return view('pages.categories.create-edit-category', [
            'category' => $category, 
        ]);
    }

    public function insert(Request $request)
    {        
        $validator = $this->validation($request);

        if (Category::where('name', 'ILIKE', $request->name)->exists()) {
            return back()
                ->withErrors(['name' => 'Já existe uma categoria com esse nome.'])
                ->withInput();
        }
        if (!$validator->fails()) {
            $category = new Category;
            $this->save($category, $request);
            return redirect()->route('categories.index'); 
        }

        $error = $validator->errors()->first();

        return response("Não foi possível criar a categoria: $error");
    }

    public function update(Request $request)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) 
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $categories = Category::find($request->id);

        if (!$categories) 
        {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Categoria não encontrada.');
        }

        $this->save($categories, $request);

        return redirect()->route('categories.index')
        ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function delete (int $id) 
    {
        $categories = Category::find($id);
        
        if ($categories){
            $categories->delete();
            return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
        }
         return redirect()->route('categories.index')
        ->with('error', 'Categoria não encontrada.');
    }

    private function validation(Request $request) 
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ], [
            'name.max' => 'O nome ncão pode ter mais que 100 caracteres.',
        ]);

        return $validation;
    }
    
    private function save(Category $category, Request $request): void 
    {
        $category->name = $request->name;
        $category->save();     
    }

}

