<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\AuthHelperService;

final class CashbackController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(AuthHelperService $authHelper): UserResource
    {
        $user = $authHelper->user();

        return (new UserResource($user))
            ->additional(['grade' => [
                'title' => $authHelper->grade()->getTitle(),
                'cashback' => $authHelper->grade()->getCashBackForCurrentPlan($user->plan),
            ]]);
    }
}
