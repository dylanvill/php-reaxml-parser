<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class CouncilRates
{
    const NODE_NAME = "councilRates";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
