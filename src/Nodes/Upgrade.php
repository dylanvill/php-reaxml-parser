<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Upgrade
{
    const NODE_NAME = "upgrade";
    
    public ?Presentation $presentation = null;

    use HasNodeValidation;

    public ?Upgrade $upgrade = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
    }
}
