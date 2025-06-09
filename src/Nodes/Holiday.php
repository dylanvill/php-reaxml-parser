<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use SimpleXMLElement;

class Holiday
{
    const NODE_NAME = "holiday";

    public ?YesNoEnum $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
