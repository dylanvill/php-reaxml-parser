<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class EField
{
    const NODE_NAME = "eField";

    use HasText, HasNodeValidation;

    public ?string $name = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
