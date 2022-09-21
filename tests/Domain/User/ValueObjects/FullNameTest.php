<?php

namespace App\Tests\Domain\User\ValueObjects;

use App\Domain\User\ValueObjects\FullName;
use PHPUnit\Framework\TestCase;

class FullNameTest extends TestCase
{
    /**
     * @return void
     */
    public function testIsequal(){
        $fullName = new FullName("Jon", "Doe");
        self::assertEquals("Jon", $fullName->getFirstName());
        self::assertEquals("Doe", $fullName->getLastName());
    }
}