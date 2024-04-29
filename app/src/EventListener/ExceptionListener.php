<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use App\Exceptions\ValidationException;
use Monolog\Attribute\WithMonologChannel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof ValidationException) {
            $errorMsg = $exception->getMessage();

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode(['error' => $errorMsg]));
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);

            $event->setResponse($response);
            $this->logger->error($errorMsg);
        }
    }
}
