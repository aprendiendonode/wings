<?php

namespace Domain\Task\States;

use Spatie\ModelStates\State;

abstract class TaskState extends State
{
    abstract public function getCode(): int;
}
