<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Depth
{
    const NODE_NAME = "depth";

    use HasText, HasNodeValidation;

    /** Expected value: "meter" - fixed */
    public ?string $unit = null;

    /** Expected values: "rear|left|right" */
    public ?string $side = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->unit = empty($attributes->unit) ? null : $attributes->unit->__toString();
        $this->side = empty($attributes->side) ? null : $attributes->side->__toString();
    }
}
