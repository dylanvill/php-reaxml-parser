<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\Range;
use SimpleXMLElement;

class RentPerSquareMetre
{
    const NODE_NAME = "rentPerSquareMetre";

    use HasText;

    public ?Range $range = null;

    public function __construct(SimpleXMLElement $node) {}
}
