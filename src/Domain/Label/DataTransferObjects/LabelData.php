<?php

namespace Domain\Label\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LabelData extends DataTransferObject
{
    public string $name;
    public string $description;
    public string $color;
}
