<?php
namespace App\Emails;

use App\Emails\Exceptions\InvalidEmailException;

class Email
{
    protected $email;

    function __construct($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }

        $this->email = $email;
    }

    public function __toString()
    {
        return $this->email;
    }
}

