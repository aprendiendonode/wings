<?php

use Spatie\DataTransferObject\DataTransferObject;

class LabelData extends DataTransferObject
{
    public string $name;
    public string $description;
    public string $color;
}
