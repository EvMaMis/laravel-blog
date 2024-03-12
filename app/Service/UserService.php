<?php

namespace App\Service;

use App\Models\User;

class UserService
{
    public function store($data)
    {
        return 'store method for users';
    }

    public function update($data, $user)
    {
        $user->update($data);
        return $user;
    }
}
