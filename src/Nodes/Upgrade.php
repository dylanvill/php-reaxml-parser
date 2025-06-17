<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Upgrade
{
    const NODE_NAME = "upgrade";
    
    public ?Presentation $presentation = null;

    use HasNodeValidation;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $presentation = $node->xpath(Presentation::NODE_NAME);
        $this->presentation = empty($presentation) ? null : new Presentation($presentation[0]);
    }
}
