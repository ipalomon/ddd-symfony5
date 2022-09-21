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
        self::assertEquals($data['lastname'], $user->firstName());
        self::assertEquals($data['username'], $user->firstName());
        self::assertEquals($data['password'], $user->firstName());
    }

    /**
     * @return void
     */
    public function testUserInstanceofUserModel(){
        $data = User::deserialize(UserDummyData::userData());

        self::assertInstanceOf(User::class, $data);
    }
}