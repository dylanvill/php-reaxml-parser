<?php

namespace App\ReaXml\Nodes;

use SimpleXMLElement;
use App\ReaXml\Nodes\Uri;

class Miniweb
{
    const NODE_NAME = "miniweb";

    /** @var Array<Uri> */
    public ?array $uri = null;

    public function __construct(SimpleXMLElement $node) {}
}
