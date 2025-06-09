<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class DateAvailable
{
    const NODE_NAME = "dateAvailable";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
