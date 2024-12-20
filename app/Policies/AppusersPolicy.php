<?php

namespace App\Policies;

use App\Models\Appusers;
use App\Models\User;

class AppusersPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Allow any authenticated user to view all Appusers
    }

    public function view(User $user, Appusers $appuser): bool
    {
        return true; // Allow viewing individual Appusers
    }

    public function create(User $user): bool
    {
        return true; // Allow any authenticated user to create Appusers
    }

    public function update(User $user, Appusers $appuser): bool
    {
        return true; // Adjust based on your authorization logic
    }

    public function delete(User $user, Appusers $appuser): bool
    {
        return true; // Adjust based on your authorization logic
    }
}
