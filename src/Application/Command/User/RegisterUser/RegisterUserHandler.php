<?php

namespace App\Application\Command\User\RegisterUser;

use App\Application\Command\CommandHandlerInterface;
use App\Domain\User\Model\User as UserModel;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\ValueObjects\FullName;
use App\Domain\User\ValueObjects\Id;
use App\Domain\User\ValueObjects\Password;
use App\Domain\User\ValueObjects\UserName;
use App\Infrastructure\User\Repository\User;
use App\Infrastructure\User\Repository\UserRepository;

class RegisterUserHandler implements CommandHandlerInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(RegisterUserCommand $command)
    {
        $fullName = new FullName($command->firsName(), $command->lastName());
        $passwd = new Password($command->password());
        $userName = new UserName($command->username());

        $newUser = UserModel::createUser($fullName->getFirstName(), $fullName->getLastName(), $userName->getUsername(), $passwd->getPassword());

        // User repository
        $user = new User();
        $user->setFirstName($newUser->firstName());
        $user->setLastName($newUser->lastName());
        $user->setUsername($newUser->userName());
        $user->setPassword($newUser->password());

        $this->repository->save($user, true);
    }

}