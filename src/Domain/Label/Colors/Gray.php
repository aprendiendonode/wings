<?php

namespace Domain\Label\Colors;

class Gray extends LabelColor
{
    public function getColor(): string
    {
        return 'gray';
    }

    public function getBackgroundColor(): string
    {
        return 'bg-gray-800';
    }

    public function getForegroundColor(): string
    {
        return 'text-gray-100';
    }
}
