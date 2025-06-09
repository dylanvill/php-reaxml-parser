<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Furnished
{
    const NODE_NAME = "furnished";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
