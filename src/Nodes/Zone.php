<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Zone
{
    const NODE_NAME = "zone";

    use HasNodeValidation, HasText;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
    }
}
