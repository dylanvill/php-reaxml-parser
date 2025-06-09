<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class EField
{
    const NODE_NAME = "eField";

    use HasText;

    public ?string $name = null;

    public function __construct(SimpleXMLElement $xml) {}
}
