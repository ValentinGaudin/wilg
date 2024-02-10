<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    /**
     * Display the resource.
     */
    public function show(Request $request): JsonResponse
    {
        $user = AuthHelper::user();

        return response()->json(['data' => new UserResource($user)]);
    }
}
