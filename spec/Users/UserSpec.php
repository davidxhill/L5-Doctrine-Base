<?php
namespace spec\App\Users;

use App\Emails\Email;
use App\Passwords\HashedPassword;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'username',
            new Email('steve@example.com'),
            new HashedPassword('ValidPassword3!')
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Users\User');
    }

    function it_should_be_delete_user()
    {
        $this->delete();
        $this->getDeletedAt()->shouldBeAnInstanceOf('\DateTime');
    }

    function it_should_set_update_and_create_at_timestamps_on_creation()
    {
        $this->setRegisterTime();
        $this->getCreatedAt()->shouldBeAnInstanceOf('\DateTime');
        $this->getUpdatedAt()->shouldBeAnInstanceOf('\DateTime');
    }
}
