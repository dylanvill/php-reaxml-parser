<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class ReturnNode
{
    const NODE_NAME = "return";

    use HasText, HasNodeValidation;

    /** Expected value:  "annual" - fixed */
    public ?string $period = null;
    /** Expected value:  "percent" - fixed */
    public ?string $unit = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->period = empty($attributes->period) ? null : $attributes->period->__toString();
        $this->unit = empty($attributes->unit) ? null : $attributes->unit->__toString();
    }
}
