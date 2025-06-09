<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class ParkingComments
{
    const NODE_NAME = "parkingComments";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
