<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class AuthHelper
{
    public static function user(): User
    {
        $user = Auth::guard('sanctum')->user();

        abort_if(boolean: !$user, code: 401);

        abort_if(boolean: !$user instanceof User, code: 401);

        return $user;
    }
}
