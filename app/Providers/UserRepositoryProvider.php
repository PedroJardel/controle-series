<?php

namespace App\Providers;

use App\Http\Repositories\EloquentUserRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserRepositoryProvider extends ServiceProvider
{
   public array $bindings = [
        UserRepository::class => EloquentUserRepository::class
    ];
}
