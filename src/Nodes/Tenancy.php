<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Tenancy
{
    const NODE_NAME = "tenancy";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
 