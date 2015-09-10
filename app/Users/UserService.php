<?php
namespace App\Users;

use App\Emails\Email;
use App\Passwords\HashedPassword;
use App\Users\Repositories\UserRepository;

class UserService
{
    public $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register($data)
    {
        $user = $data['name'];
        $email = new Email($data['email']);
        $password = new HashedPassword($data['password']);
        $user = new User($user, $email, $password);

        $this->userRepo->add($user);

        return $user;
    }
}
