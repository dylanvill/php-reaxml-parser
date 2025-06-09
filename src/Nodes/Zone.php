<?php

namespace App\ReaXml\Nodes;

use SimpleXMLElement;

class Zone
{
    const NODE_NAME = "zone";

    public ?string $value = null;

    public function __construct(SimpleXMLElement $xml) {}
}
