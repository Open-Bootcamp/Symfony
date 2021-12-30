<?php

// src/Service/MessageGenerator.php
namespace App\Service;
// servicios
use Psr\Log\LoggerInterface;

class MessageGenerator
{

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getHappyMessage(): string
    {

        $this->logger->warning('About to find a happy message!');

        return true;
    }
}