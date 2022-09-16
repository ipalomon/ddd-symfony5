<?php

namespace App\Domain\User\ValueObjects;

class FullName
{
    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string
     */
    private string $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        if ($firstName === "" ){
            throw new \InvalidArgumentException("The first name should be no empty: {$firstName}.");
        }

        if ($lastName === "" ){
            throw new \InvalidArgumentException("The last name should be no empty: {$lastName}.");
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}