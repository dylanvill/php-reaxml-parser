<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class YearLastRenovated
{
    const NODE_NAME = "yearLastRenovated";

    use HasNodeValidation;

    public ?string $value = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->value = empty($attributes->value) ? null : $attributes->value->__toString();
    }
}
