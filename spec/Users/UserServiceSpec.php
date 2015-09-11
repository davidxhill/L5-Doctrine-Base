<?php
namespace spec\App\Users;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Users\Repositories\UserRepository;

class UserServiceSpec extends ObjectBehavior
{
    function let(UserRepository $userRepo)
    {
        $this->beConstructedWith($userRepo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Users\UserService');
    }

    function it_should_register_user_and_returns_created_user()
    {
        $data = [
            'name' => 'Steve',
            'email' => 'steve@example.com',
            'password' => 'ValidPassword3!'
        ];

        $user = $this->register($data)->shouldReturnAnInstanceOf('App\Users\User');
    }
}
