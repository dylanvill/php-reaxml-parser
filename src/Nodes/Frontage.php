<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Frontage
{
    const NODE_NAME = "frontage";

    use HasText, HasNodeValidation;

    /** Expected values: "meter" - fixed */
    public ?string $unit = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();

        $this->unit = empty($attributes->unit) ? null : $attributes->unit->__toString();
    }
}
