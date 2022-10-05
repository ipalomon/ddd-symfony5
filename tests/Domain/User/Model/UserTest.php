<?php

namespace App\Tests\Domain\User\Model;

use App\Domain\User\Model\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetters(){
        $data = UserDummyData::userData();
        $user = User::deserialize($data);

        self::assertEquals($data['id'], $user->id());
        self::assertEquals($data['firstname'], $user->firstName());
        self::assertEquals($data['lastname'], $user->lastName());
        self::assertEquals($data['username'], $user->userName());
        self::assertEquals($data['password'], $user->password());
    }

    /**
     * @return void
     */
    public function testUserInstanceofUserModel(){
        $data = User::deserialize(UserDummyData::userData());

        self::assertInstanceOf(User::class, $data);
    }
}