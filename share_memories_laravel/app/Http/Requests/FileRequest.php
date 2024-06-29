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
            'album_id' => ['required', 'integer', 'numeric', 'min:1'],
            'description' => ['nullable', 'string', 'max:300'],
            'rights' => [Rule::enum(RightsEnum::class)],
            'files' => ['required', 'array', 'min:1', 'max:10'],
            'files.*' => [
                'min:10',
                'max:512',
                'mimes:jpeg,jpg,gif,png,webp,tiff,bmp,svg,'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'album_id.required' => 'Не указан альбом, в который нужно сохранить файлы',
            'album_id.integer' => 'Параметр "album_id" должен быть числом',
            'album_id.numeric' => 'Параметр "album_id" должен быть числом',
            'album_id.min' => 'Параметр "album_id" меньше допустимого',

            'description.string' => 'Параметр "description" должен быть строкой',
            'description.max' => 'Описание альбома не может быть больше 300 символов',

            'rights' => 'Параметр "rights" несоответствует ожидаемому',

            'files.array' => 'Ожидается, что файлы должны быть в массиве',
            'files.min' => 'Не получено ни одного файла',
            'files.max' => 'Прикреплено слишком много файлов',

            'files.*.min' => 'Размер одного из прикрепленных файлов слишком маленький',
            'files.*.max' => 'Размер одного из прикрепленных файлов слишком большой',
            'files.*.mimes' => 'Один из прикрепленных файлов неправильного формата'
        ];
    }
}
