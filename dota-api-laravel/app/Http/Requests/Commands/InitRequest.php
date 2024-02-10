<?php

namespace App\Http\Requests\Commands;

use Illuminate\Foundation\Http\FormRequest;

class InitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "discordServerId" => 'required|numeric',
            "discordChannelId" => 'required|numeric',
        ];
    }
}
