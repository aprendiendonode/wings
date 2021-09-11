<?php

namespace Domain\Label\Colors;

class Blue extends LabelColor
{
    public function getColor(): string
    {
        return 'blue';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-blue-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-blue-100';
    }
}
