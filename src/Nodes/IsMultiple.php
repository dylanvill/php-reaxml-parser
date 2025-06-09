<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use SimpleXMLElement;

class IsMultiple
{
    const NODE_NAME = "isMultiple";
    
    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
