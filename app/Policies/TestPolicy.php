<?php

// namespace App\Policies;

// use App\Models\User;
// use App\Models\test;
// use Illuminate\Auth\Access\Response;

// class TestPolicy
// {
//     /**
//      * Determine whether the user can view any models.
//      */
//     public function viewAny(User $user): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can view the model.
//      */
//     public function view(User $user, test $test): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can create models.
//      */
//     public function create(User $user): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can update the model.
//      */
//     public function update(User $user, test $test): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can delete the model.
//      */
//     public function delete(User $user, test $test): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can restore the model.
//      */
//     public function restore(User $user, test $test): bool
//     {
//         return false;
//     }

//     /**
//      * Determine whether the user can permanently delete the model.
//      */
//     public function forceDelete(User $user, test $test): bool
//     {
//         return false;
//     }
// }


namespace App\Policies;

use App\Models\Test;
use App\Models\User;

class TestPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Test $test)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Test $test)
    {
        return true;
    }

    public function delete(User $user, Test $test)
    {
        return true;
    }
}
