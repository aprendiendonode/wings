<?php

namespace Domain\Task\States;

class Closed extends TaskState
{
    public const CODE = 0;

    public function getCode(): int
    {
        return self::CODE;
    }
}
