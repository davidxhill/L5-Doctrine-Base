<?php
namespace App\Users\Repositories;

use App\Users\User;

interface UserRepository
{
   /**
     * Add a new User_
     *
     * @param User $user
     * @return void
     */
    public function add(User $user);
}
