<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;

class OnboardingRegistrationResponse implements RegistrationResponse
{
    public function toResponse($request)
    {
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
