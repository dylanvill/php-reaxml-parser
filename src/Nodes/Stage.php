<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Stage
{
    const NODE_NAME = "stage";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
