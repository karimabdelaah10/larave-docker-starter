<?php

namespace App\Modules\User\Repositories;


use App\Modules\User\User;

class UserRepository
{
    public function __construct($user = null)
    {
        if ($user instanceof User) {
            $this->model = $user;
        } else {
            $this->model = new User();
        }
    }

    public function findOrFail($id): ?User
    {
        return $this->model->findOrFail($id);
    }

    public function update($data, $id)
    {
        $user = $this->model->find($id);
        if ($user) {
            return $user->update($data);
        }
        return false;

    }
}
