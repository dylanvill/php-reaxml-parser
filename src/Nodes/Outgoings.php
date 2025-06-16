<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Outgoings
{
    const NODE_NAME = "outgoings";

    use HasText, HasNodeValidation;

    /** Expected value: "annual" */
    public ?string $period = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->period = empty($attributes->period) ? null : $attributes->period->__toString();
    }
}
