<?php

namespace Domain\Label\Colors;

class Black extends LabelColor
{
    public function getColor(): string
    {
        return 'black';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-black';
    }

    public function getForegroundColor(): string
    {
        return 'text-white';
    }
}
