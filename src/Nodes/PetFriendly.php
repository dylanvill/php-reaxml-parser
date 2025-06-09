<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class PetFriendly
{
    const NODE_NAME = "petFriendly";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
