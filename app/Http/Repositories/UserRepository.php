<?php
namespace App\Http\Repositories;

use App\Models\User;

interface UserRepository
{
    public function add(array $data): User;
}
