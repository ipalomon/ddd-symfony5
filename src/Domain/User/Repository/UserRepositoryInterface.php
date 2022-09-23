<?php

namespace App\Domain\User\Repository;

use App\Infrastructure\User\Repository\User;

interface UserRepositoryInterface
{
    public function save(User $entity, bool $flush = false): void;
    public function delete(User $entity, bool $flush = false):void;
}