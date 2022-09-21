<?php
declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

class Password
{
    private string $password;

    /**
     * @param string $password
     */
    public function __construct(string $password)
    {
        if (empty(trim($password))){
            throw new \InvalidArgumentException("The password should be no empty: {$password}.");
        }

        if(strlen($password) < 8){
            throw new \InvalidArgumentException("The password les than 8 chars: {$password}.");
        }
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}