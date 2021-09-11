<?php

namespace Domain\Task\States;

class Reviewed extends TaskState
{
    public const CODE = 25;

    public function getCode(): int
    {
        return self::CODE;
    }
}
