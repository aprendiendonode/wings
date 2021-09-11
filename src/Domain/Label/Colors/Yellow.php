<?php

namespace Domain\Label\Colors;

class Yellow extends LabelColor
{
    public function getColor(): string
    {
        return 'yellow';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-yellow-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-yellow-100';
    }
}
