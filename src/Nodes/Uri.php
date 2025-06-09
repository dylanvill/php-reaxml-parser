<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Uri
{
    const NODE_NAME = "urn";

    use HasText;

    /** Expected values: 1 - 3 */
    public ?int $id = null;

    public function __construct(SimpleXMLElement $node) {}
}
