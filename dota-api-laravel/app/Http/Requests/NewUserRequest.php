<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "discord_id" => 'required|unique:users,discord_id|numeric',
            "name"=> 'required|string',
        ];
    }
}
