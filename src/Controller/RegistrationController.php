<?php

namespace App\Controller;

use App\Application\Command\User\RegisterUser\RegisterUserCommand;

use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @var CommandBus
     */
    private CommandBus $commandBus;

    public function __construct( CommandBus $commandBus ) {
        $this->commandBus = $commandBus;
    }
    /**
     * @Route("/user", name="new-user")
     */
    public function register( Request $request): JsonResponse
    {

        $parameters = json_decode($request->getContent(), true);
        $firstName = $parameters["firstname"];
        $lastName = $parameters["lastname"];
        $username = $parameters["username"];
        $password = $parameters["password"];

        //$command = new RegisterUser($request->request->get('username'), $request->request->get('password'));
        $command = new RegisterUserCommand($firstName, $lastName, $username, $password);

        $this->commandBus->handle($command );

        return $this->json(['user' => $command], 200, ['Content-Type' => 'application/json']);
    }
}