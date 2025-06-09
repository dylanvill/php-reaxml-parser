<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use SimpleXMLElement;

class DepositTaken
{
    const NODE_NAME = "depositTaken";

    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
