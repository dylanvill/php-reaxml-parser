<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Auction
{
    const NODE_NAME = "auction";

    use HasNodeValidation;

    public ?string $date = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->date = empty($attributes->date) ? null : $attributes->date->__toString();
    }
}
