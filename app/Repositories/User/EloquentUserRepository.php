<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class EloquentUserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function findUserByEmail($email)
    {
        return $this->model->query()->where('email', $email)->get();
    }

}
