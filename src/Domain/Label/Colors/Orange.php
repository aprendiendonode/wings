<?php

namespace Domain\Label\Colors;

class Orange extends LabelColor
{
    public function getColor(): string
    {
        return 'orange';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-orange-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-orange-100';
    }
}
