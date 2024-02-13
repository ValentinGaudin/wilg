<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\AuthHelperService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    /**
     * Display the resource.
     */
    public function show(Request $request, AuthHelperService $authHelper): JsonResponse
    {
        $user = $authHelper->user();

        ray($authHelper->grade());

        return response()->json(['data' => new UserResource($user)]);
    }
}
