<?php

namespace App\Repositories;


use App\Models\User;

class UserRepository extends RepositoryEloquentAbstract
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
