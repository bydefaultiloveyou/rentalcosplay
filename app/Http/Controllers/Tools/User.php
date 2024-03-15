<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    // get a id user
    static function ID(string $key = 'email', string $value): array | string
    {
        return ModelsUser::where($key, $value)->first()->id;
    }
}
