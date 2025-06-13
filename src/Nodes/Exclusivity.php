<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Exclusivity
{
    const NODE_NAME = "exclusivity";

    use HasNodeValidation;

    /** Expected values: "exclusive|open" */
    public ?string $value = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->value = empty($attributes->value) ? null : $attributes->value->__toString();
    }
}
