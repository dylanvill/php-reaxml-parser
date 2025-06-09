<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class FurtherOptions
{
    const NODE_NAME = "furtherOptions";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
