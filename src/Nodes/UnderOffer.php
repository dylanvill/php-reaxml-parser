<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class UnderOffer
{
    const NODE_NAME = "underOffer";

    use HasNodeValidation;

    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->value = empty($attributes->value) ? null : YesNoEnum::parse($attributes->value->__toString());
    }
}
