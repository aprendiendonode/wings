<?php

namespace Domain\Label\Colors;

class Brown extends LabelColor
{
    public function getColor(): string
    {
        return 'brown';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-brown-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-brown-100';
    }
}
