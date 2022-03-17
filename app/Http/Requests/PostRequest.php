<?php

namespace App\Http\Requests;

use App\Enums\PostStatusEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Spatie\Enum\Laravel\Rules\EnumRule;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'content' => ['required', 'string', 'min:1'],
            'publish_date' => ['nullable', 'date', 'after:yesterday'],
            'status' => ['nullable', new EnumRule(PostStatusEnum::class)]
        ];
    }
}
