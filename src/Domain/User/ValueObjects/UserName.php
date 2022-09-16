<?php

namespace App\Domain\User\ValueObjects;

class UserName
{
    private string $username;

    /**
     * @param string $username
     */
    public function __construct(string $username)
    {
        if ($username === "" ){
            throw new \InvalidArgumentException("The user name should be no empty: {$username}.");
        }

        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("The user name should be email: {$username}.");
        }

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }


}