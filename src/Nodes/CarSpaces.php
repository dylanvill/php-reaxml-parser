<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class CarSpaces
{
    const NODE_NAME = "carSpaces";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
