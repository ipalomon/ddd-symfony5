<?php

namespace App\Domain\User\Model;

class User
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $firstName;

    /**
     * @var string
     */
    private string $lastName;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @var string
     */
    private string $password;

    public function id(): ?int
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function userName(): string
    {
        return $this->userName;
    }

    public function password(): string
    {
        return $this->password;
    }

    public static function constructor(int $id, string $firstName, string $lastName, string $username, string $password) :self{
        $user = new self();
        $user->id = $id;
        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->userName = $username;
        $user->password = $password;
        return $user;
    }

    public static function createUser($firstName, $lastName, $username, $password):User{
        $userArray = array(
            'id' => 0,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'username' => $username,
            'password' => $password
        );
        return User::deserialize($userArray);
    }

    public static function deserialize(array $data): self
    {
        return User::constructor(
          $data['id'], $data['firstname'], $data['lastname'], $data['username'], $data['password']
        );
    }

}