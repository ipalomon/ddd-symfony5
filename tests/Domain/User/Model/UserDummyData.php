<?php

namespace App\Tests\Domain\User\Model;

class UserDummyData
{
    public static function userData():array
    {
        return array(
            'id' => 1,
            'firstname' => 'Pepe',
            'lastname' => 'Jhon',
            'username' => 'pep@pep.es',
            'password' => 'oUIhjg67Y'
        );
    }
}