<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Override;
use Symfony\Component\HttpFoundation\Response;

final class LogoutResponse implements \Laravel\Fortify\Contracts\LogoutResponse
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function toResponse($request): JsonResponse|Response|RedirectResponse
    {
        return $request->wantsJson()
            ? response()->json(['message' => 'Successfully logged out'])
            : redirect([Fortify::redirects('logout', '/')]);
    }
}
