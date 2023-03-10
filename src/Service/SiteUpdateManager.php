<?php

namespace MyApp\Service;

class SiteUpdateManager
{
    private $messageGenerator;

    public function __construct(MessageGenerator $messageGenerator)
    {
        $this->messageGenerator = $messageGenerator;
    }

    public function notifyOnSiteUpdate(): void
    {
        $happyMessage = $this->messageGenerator->getHappyMessage();
    }
}
