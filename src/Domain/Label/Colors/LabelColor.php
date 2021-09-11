<?php

namespace Domain\Label\Colors;

use Spatie\ModelStates\State;

abstract class LabelColor extends State
{
    abstract public function getColor(): string;

    abstract public function getBackgroundColor(): string;

    abstract public function getForegroundColor(): string;
}
