<?php

namespace App\ReaXml\Nodes;

use SimpleXMLElement;

class AvailabilityLink
{
    const NODE_NAME = "availabilityLink";

    public ?string $href;

    public function __construct(SimpleXMLElement $xml) {}
}
