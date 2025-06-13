<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Holiday
{
    const NODE_NAME = "holiday";

    use HasText, HasNodeValidation;

    public ?YesNoEnum $value = null;


    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->value = empty($attributes->value) ? null : YesNoEnum::parse($attributes->value->__toString());
    }
}
