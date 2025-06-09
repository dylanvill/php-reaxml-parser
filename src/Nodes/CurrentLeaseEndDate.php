<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class CurrentLeaseEndDate
{
    const NODE_NAME = "currentLeaseEndDate";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
