<?php

namespace Domain\Label\Colors;

class Green extends LabelColor
{
    public function getColor(): string
    {
        return 'green';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-green-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-green-100';
    }
}
