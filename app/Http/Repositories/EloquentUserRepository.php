<?php

namespace App\Http\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function add(array $data): User
    {
        return User::create($data);
    }
}
