<?php

namespace App\Application\Command\User\RegisterUser;

use App\Application\Command\CommandHandlerInterface;
use App\Domain\User\Model\User as UserModel;
use App\Infrastructure\User\Repository\User;
use App\Infrastructure\User\Repository\UserRepository;

class RegisterUserHandler implements CommandHandlerInterface
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(RegisterUserCommand $command)
    {
        $newUser = UserModel::createUser($command->firsName(), $command->lastName(), $command->username(), $command->password());

        // User repository
        $user = new User();
        $user->setFirstName($newUser->firstName());
        $user->setLastName($newUser->lastName());
        $user->setUsername($newUser->userName());
        $user->setPassword($newUser->password());

        $this->repository->add($user, true);
    }

}