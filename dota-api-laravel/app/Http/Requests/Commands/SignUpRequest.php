<?php

namespace App\Http\Requests\Commands;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "discordUserName" => 'required|string',
            "discordUserId" => 'required|numeric',
            "discordServerId" => 'required|numeric',
            "steamAccountId" => 'required|numeric',
        ];
    }
}
