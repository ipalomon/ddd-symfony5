<?php

namespace App\Tests\Domain\User\ValueObjects;

use App\Domain\User\ValueObjects\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /**
     * @return void
     */
    public function testIsequal(){
        $password = new Password("5tyhjio0P");
        self::assertEquals("Jon", $password->getPassword());
    }

    /**
     * @return void
     */
    public function testGreaterEqual8Chars(){
        $password = new Password("5tyhjio0P");
        self::assertGreaterThan(8, strlen($password->getPassword()));
    }

}