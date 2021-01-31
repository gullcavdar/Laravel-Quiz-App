<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // oturum açık mı ?
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
            'title' => 'required| min:3 | max:200',
            'description' => 'max:1000',
            'finished_at' => 'nullable|after:' . now(), //boş olmadığında bu tarihten sonrasını gir

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Quiz Başlığı',
            'description' => 'Ouiz Açıklama',
            'finished_at' => 'Bitiş tarihi',
        ];
    }
}