<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;
use AdGroup\ReaxmlParser\Nodes\Uri;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;

class Miniweb
{
    const NODE_NAME = "miniweb";

    use HasNodeValidation;

    /** @var Array<Uri> */
    public ?array $uri = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $uris = $node->xpath(Uri::NODE_NAME);

        foreach ($uris as $uri) {
            $this->uri[] = new Uri($uri);
        }
    }
}
