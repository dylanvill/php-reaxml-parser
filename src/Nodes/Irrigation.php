<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Irrigation
{
    const NODE_NAME = "irrigation";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
