<?php

namespace Domain\Label\Colors;

class Purple extends LabelColor
{
    public function getColor(): string
    {
        return 'purple';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-purple-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-purple-100';
    }
}
