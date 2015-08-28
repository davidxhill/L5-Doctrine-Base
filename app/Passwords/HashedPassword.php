<?php
namespace App\Passwords;

use App\Passwords\Exceptions\FailedPasswordValidationException;

class HashedPassword
{
    private $hash;

    private $errors = [];

    private $distance;

    public function __construct($newPassword, $oldPassword = '')
    {
        $this->distance = $this->getDistance($newPassword, $oldPassword);

        if (! $this->validation($newPassword))
            throw new FailedPasswordValidationException;

        $this->hash = $this->hashPassword($newPassword);
    }

    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function validation($newPassword)
    {
        if ($this->distance < $this->getMinDistance())
            return false;

        return preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,50}$/', $newPassword);
    }

    private function getMinDistance()
    {
        return getenv('MIN_PASSWORD_DISTANCE') ?: 3;
    }

    private function getDistance($newPassword, $oldPassword)
    {
        return levenshtein(strtolower($newPassword), strtolower($oldPassword));
    }

    public function toString()
    {
        return $this->hash;
    }
}
