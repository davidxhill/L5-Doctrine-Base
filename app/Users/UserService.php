<?php
namespace App\Users;

use App\Emails\Email;
use App\Passwords\HashedPassword;

class UserService
{
    public function register($data)
    {
        $user = $data['name'];
        $email = new Email($data['email']);
        $password = new HashedPassword($data['password']);

        $user = new User($user, $email, $password);

        return $user;
    }
}
