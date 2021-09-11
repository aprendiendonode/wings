<?php

namespace Domain\Label\Colors;

class White extends LabelColor
{
    public function getColor(): string
    {
        return 'white';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-white';
    }

    public function getForegroundColor(): string
    {
        return 'text-black';
    }
}
