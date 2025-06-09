<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Services
{
    const NODE_NAME = "services";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
