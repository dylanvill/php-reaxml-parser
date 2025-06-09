<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class AnnualRainfall
{
    const NODE_NAME = "annualRainFall";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
