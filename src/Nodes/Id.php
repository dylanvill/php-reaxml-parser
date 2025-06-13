<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Id
{
    const NODE_NAME = "id";

    use HasText, HasNodeValidation;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
    }
}
