<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Telephone
{
    const NODE_NAME = "telephone";

    use HasText, HasNodeValidation;

    /** Expected values: "AH|mobile" */
    public ?string $type = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->type = empty($attributes->type) ? null : $attributes->type->__toString();
    }
}
