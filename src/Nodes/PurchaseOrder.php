<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class PurchaseOrder
{
    const NODE_NAME = "purchaseOrder";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
