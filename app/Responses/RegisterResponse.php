<?php

namespace App\Responses;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Override;
use Symfony\Component\HttpFoundation\Response;

final class RegisterResponse implements \Laravel\Fortify\Contracts\RegisterResponse
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function toResponse($request): JsonResponse|Response|RedirectResponse
    {
        $user = User::query()->where('email', $request->string('email'))->first();

        abort_if(! $user, 404, 'No user found');

        return $request->wantsJson()
            ? response()->json([
                'message' => 'Registration successful, please verify your email to confirm your account.',
                'token' => $user->createToken($request->string('email'))->plainTextToken,
            ])
            : redirect()->intended(Fortify::redirects('register'));
    }
}
