<?php

namespace Domain\Label\Colors;

class Pink extends LabelColor
{
    public function getColor(): string
    {
        return 'pink';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-pink-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-pink-100';
    }
}
