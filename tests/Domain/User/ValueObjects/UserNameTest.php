<?php

namespace App\Tests\Domain\User\ValueObjects;

use App\Domain\User\ValueObjects\UserName;
use PHPUnit\Framework\TestCase;

class UserNameTest extends TestCase
{
    /**
     * @return void
     */
    public function testIsequal(){
        $userName = new Username("prueba@prueba.es");
        self::assertEquals("prueba@prueba.es", $userName->getUserName());
    }
}