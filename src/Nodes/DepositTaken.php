<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use SimpleXMLElement;

class DepositTaken
{
    const NODE_NAME = "depositTaken";

    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
