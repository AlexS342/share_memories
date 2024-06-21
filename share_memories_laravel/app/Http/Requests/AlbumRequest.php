<?php

namespace App\Http\Requests;

use App\Enum\RightsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlbumRequest extends FormRequest
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
            'album_id' => ['integer', 'numeric'],
            //TODO дописать правила проверки ссылки на обложку альбома после реализации функционала
            'cover' => ['nullable', 'string'],
            'name' => ['string', 'min:3', 'max:20'],
            'description' => ['nullable', 'string', 'max:300'],
            'rights' => [Rule::enum(RightsEnum::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'album_id.integer' => 'Параметр "album_id" должен быть числом',
            'album_id.numeric' => 'Параметр "album_id" должен быть числом',
            'cover.string' => 'Параметр "cover" должен быть строкой',
            'name.string' => 'Параметр "name" должен быть строкой',
            'name.max' => 'Название альбома не может быть больше 20 символов',
            'description.string' => 'Параметр "description" должен быть строкой',
            'description.max' => 'Описание альбома не может быть больше 300 символов',
            'rights' => 'Параметр "rights" несоответствует ожидаемому',
        ];
    }
}
