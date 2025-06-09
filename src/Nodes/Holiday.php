<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use SimpleXMLElement;

class Holiday
{
    const NODE_NAME = "holiday";

    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
