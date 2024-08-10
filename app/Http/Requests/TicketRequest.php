<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'cost' => ['required'],
            'special_validity' => ['nullable'],
            'date' => ['nullable'],
            'amount' => ['nullable']
        ];
    }
}
