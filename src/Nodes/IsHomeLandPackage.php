<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class IsHomeLandPackage
{
    const NODE_NAME = "isHomeLandPackage";

    use HasNodeValidation;

    public YesNoEnum $value = YesNoEnum::NO;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();

        if (!empty($attributes->value)) {
            $this->value = YesNoEnum::parse(
                current((array) $attributes->value)
            );
        }
    }
}
