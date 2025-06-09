<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class PurchaseOrder
{
    const NODE_NAME = "purchaseOrder";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
