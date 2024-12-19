<?php

namespace App\Policies;

use App\Models\Cities;
use App\Models\User;

class CitiesPolicy
{
    public function viewAny(User $user)
    {
        return true; // Adjust based on your application's authorization logic
    }

    public function view(User $user, Cities $city)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Cities $city)
    {
        return true;
    }

    public function delete(User $user, Cities $city)
    {
        return true;
    }
}
