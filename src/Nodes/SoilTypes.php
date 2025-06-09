<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class SoilTypes
{
    const NODE_NAME = "soilTypes";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
