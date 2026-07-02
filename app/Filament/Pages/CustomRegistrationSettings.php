<?php

namespace App\Filament\Pages;

use Tallcms\FilamentRegistration\Filament\Pages\RegistrationSettings;

class CustomRegistrationSettings extends RegistrationSettings
{
    public static function canAccess(): bool
    {
        // Security: Custom pages default to allowing access for all
        // authenticated panel users. Override this method to restrict
        // access based on roles, permissions, or other logic.

        return false;
    }
}
