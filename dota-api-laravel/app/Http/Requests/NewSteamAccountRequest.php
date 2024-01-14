<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSteamAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "id" => 'required|unique:steam_accounts|numeric',
            "name"=> 'required|string',
            "discord_user_id" => 'required|exists:users,discord_id|numeric',
        ];
    }
}
