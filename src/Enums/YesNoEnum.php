<?php

namespace AdGroup\ReaxmlParser\Enums;

enum YesNoEnum: string
{
    case YES = "yes";
    case NO = "no";

    public static function parse(mixed $value): self
    {
        return match ($value) {
            "yes" => YesNoEnum::YES,
            "no" => YesNoEnum::NO,
            boolval($value) === true => YesNoEnum::YES,
            boolval($value) === false => YesNoEnum::NO,
        };
    }
}
