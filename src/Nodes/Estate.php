<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Stage;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Estate
{
    const NODE_NAME = "estate";

    use HasText, HasNodeValidation;

    public ?Name $name = null;
    public ?Stage $stage = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
    }
}
