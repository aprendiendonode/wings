<?php

namespace Domain\Task\States;

class Open extends TaskState
{
    public const CODE = 100;

    public function getCode(): int
    {
        return self::CODE;
    }
}
