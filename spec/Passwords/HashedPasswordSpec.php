<?php
namespace spec\App\Passwords;

use App\Passwords\Exceptions\FailedPasswordValidationException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HashedPasswordSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('ValidPassword3!');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Passwords\HashedPassword');
    }

    function it_hashes_password_on_creation()
    {
        $this->__toString()->shouldHaveMinLenth(36);
    }

    function it_throws_exeception_if_validation_fails()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['asdf']);
    }

    function it_throws_exeception_if_new_password_is_close_to_old_password()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['ValidPassword3!', 'ValidPassword2!']);
    }

    function it_throws_exeception_if_new_password_does_not_contain_valid_symbol()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['ValidPassword3']);
    }

    function it_throws_exeception_if_new_password_does_not_contain_number()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['ValidPassword!']);
    }

    function it_throws_exeception_if_new_password_does_not_contain_lower()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['VALIDPASSWORD3!']);
    }

    function it_throws_exeception_if_new_password_does_not_contain_upper()
    {
        $this->shouldThrow(new FailedPasswordValidationException)->during('__construct', ['validpassword3!']);
    }

    function getMatchers()
    {
        return array(
            'haveMinLenth' => function($result, $count) {
                return strlen($result) >= $count;
            }
        );
    }
}
