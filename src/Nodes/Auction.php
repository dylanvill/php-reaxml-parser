<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class Auction
{
    const NODE_NAME = "auction";

    use HasNodeValidation;

    public ?string $date;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
    }
}
