<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Bond
{
    const NODE_NAME = "bond";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
