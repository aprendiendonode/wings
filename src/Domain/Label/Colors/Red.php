<?php

namespace Domain\Label\Colors;

class Red extends LabelColor
{
    public function getColor(): string
    {
        return 'red';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-red-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-red-100';
    }
}
