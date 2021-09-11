<?php

namespace Domain\Task\States;

class InProgress extends TaskState
{
    public const CODE = 50;

    public function getCode(): int
    {
        return self::CODE;
    }
}
