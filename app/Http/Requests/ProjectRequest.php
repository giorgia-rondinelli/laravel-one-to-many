<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|min:3|max:50',
            'languages'=> 'required|min:3|max:30',
            'status'=> 'required',
            'technology_id'=> 'required',

        ];
    }
    public function messages(){
        return[
            'title.required'=>'il titolo è un campo obbligatorio ',
            'title.min'=>'il titolo deve avere :min caratteri ',
            'title.max'=>'il titolo può avere :max caratteri ',
            'languages.required'=>'il linguaggio è un campo obbligatorio ',
            'languages.min'=>'il linguaggio deve avere :min caratteri ',
            'languages.max'=>'il linguaggio può avere :max caratteri ',
            'status.required'=>'lo status è un campo obbligatorio ',
            'technology_id.required'=>'la tecnologia  è un campo obbligatorio ',
        ];

    }
}
