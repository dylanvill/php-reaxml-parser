<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\Name;
use App\ReaXml\Nodes\Stage;
use SimpleXMLElement;

class Estate
{
    public ?Name $name = null;
    public ?Stage $stage = null;

    public function __construct(SimpleXMLElement $node) {}
}
