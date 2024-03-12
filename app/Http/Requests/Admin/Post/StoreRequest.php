<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|dimensions:ratio=16/9,min_width:200,min_height:400',
            'main_image' => 'required|dimensions:ratio=16/9,min_width:200,min_height:400',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо заполнить поле заголовка',
            'title.string' => 'Поле не соответствует строчному типу данных',
            'content.required' => 'Необходимо заполнить содержимое публикации',
            'content.string' => 'Поле не соответствует строчному типу данных',
            'preview_image.required' => 'Необходимо добавить изображение для превью',
            'preview_image.min_width' => 'Изображение слишком маленького размера по ширине',
            'preview_image.min_height' => 'Изображение слишком маленького размера по высоте',
            'preview_image.dimensions' => 'Необходимо использовать изображение с разрешением сторон 16:9',
            'main_image.required' => 'Необходимо добавить главное изображение',
            'main_image.min_width' => 'Изображение слишком маленького размера по ширине',
            'main_image.min_height' => 'Изображение слишком маленького размера по высоте',
            'main_image.dimensions' => 'Необходимо использовать изображение с разрешением сторон 16:9',
            'category_id.required' => 'Необходимо указать категорию публикации',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории не существует в базе',
            'tag_ids.array' => 'Теги должны быть в форме массива',

        ];
    }
}
