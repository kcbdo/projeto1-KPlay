<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|string|max:100',
            'descricao' => 'required|string|max:500',
            'link' => 'required|url|max:100',
            'duration' => 'required',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'link.required' => 'O link é obrigatório.',
            'link.url' => 'O link deve ser uma URL válida.',
            'duration.required' => 'A duração é obrigatória.',
            'categories.*.exists' => 'Uma das categorias selecionadas não existe.',
        ];
    }
    
}
