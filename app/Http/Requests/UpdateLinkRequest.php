<?php

namespace App\Http\Requests;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UpdateLinkRequest extends FormRequest
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
            'url' => 'sometimes|required|url',
            'title' => 'sometimes|required|string|min:3|max:255',
            'description' => 'sometimes|nullable|string|max:255',
            'position' => 'sometimes|nullable|string|in:up,down',
        ];
    }

    public function updateLink()
    {
        $link = Link::findOrFail($this->route('link')->id);
        if ($link->url === $this->url) {
            $newRequest = $this->except('url');
            $validatedData = Validator::make(
                $newRequest,
                [
                    'title' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                ]
            )->validate();
            return $validatedData;
        }
        return $this->validated();
    }
}
