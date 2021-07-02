<?php


class Communication
{
    protected $communicationService;

    public function setCommunicationService(CommunicationService $communicationService): void
    {
        $this->communicationService = $communicationService;
    }

    public function handleCommunicationSubscribe(int $times, string $return): string
    {
        if ($times === 0)
        {
            return $return;
        }

        for ($i = 0; $i < $times; $i++)
        {
            $this->communicationService->subscribe();
        }

        return $return;
    }
}