<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPlayerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "id" => 'required|unique:players|numeric',
            "name"=> 'required|string',
            "discord_user_id" => 'required|exists:users,discord_id|numeric',
        ];
    }
}
