<?php

namespace App\Repositories\Traits;
use App\Models\User;

trait AuthenticatedUserTrait
{
    public function getUser(): User
    {
        return auth()->user();
    }
}