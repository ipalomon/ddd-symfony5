<?php

namespace App\Application\Command\User\RegisterUser;

class RegisterUserCommand
{
    public string $firsName;
    public string $lastName;
    public string $username;
    public string $password;

    public function __construct(string $firsName, string $lastName, string $username, string $password)
    {
        $this->firsName = $firsName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function firsName(): string
    {
        return $this->firsName;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }


}