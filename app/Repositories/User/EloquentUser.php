<?php 

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\EloquentRepository;
use App\User;

class EloquentUser extends EloquentRepository implements BaseRepository, UserRepository{
    
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function changePassword($password, $id)
    {
        $user = $this->model->find($id);
        $user->setPassword($password);
    }
}

?>