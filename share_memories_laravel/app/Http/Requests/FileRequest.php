<?php

namespace App\Http\Requests;

use App\Enum\RightsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FileRequest extends FormRequest
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
            'album_id' => ['nullable', 'integer', 'numeric', 'min:1'],
            'description' => ['nullable', 'string', 'max:300'],
            'rights' => [Rule::enum(RightsEnum::class)],
            'files' => ['array']
            //TODO добавить проверку файлов
        ];
    }

    public function messages(): array
    {
        return [
            'album_id.integer' => 'Параметр "album_id" должен быть числом',
            'album_id.numeric' => 'Параметр "album_id" должен быть числом',
            'description.string' => 'Параметр "description" должен быть строкой',
            'description.max' => 'Описание альбома не может быть больше 300 символов',
            'rights' => 'Параметр "rights" несоответствует ожидаемому',
            'files.array' => 'Ожидается, что файлы должны быть в массиве',
        ];
    }
}
