<?php

namespace App\Responses;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Override;
use Symfony\Component\HttpFoundation\Response;

final class LoginResponse implements \Laravel\Fortify\Contracts\LoginResponse
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function toResponse($request): JsonResponse|Response|RedirectResponse
    {
        if ($request->wantsJson()) {
            $user = User::query()->where('email', $request->string('email'))->first();

            abort_if(! $user, 404, 'No user found');

            return response()->json([
                'message' => 'You are successfully logged in',
                'token' => $user->createToken($request->string('email'))->plainTextToken,
            ]);
        }

        return redirect()->intended(Fortify::redirects('login'));
    }
}
