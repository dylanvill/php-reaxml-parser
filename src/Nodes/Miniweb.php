<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;
use AdGroup\ReaxmlParser\Nodes\Uri;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;

class Miniweb
{
    const NODE_NAME = "miniweb";

    use HasNodeValidation, ParsesExtraElements;

    /** @var Array<Uri> */
    public ?array $uri = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->parseExtraElements($node);

        $uris = $node->xpath(Uri::NODE_NAME);

        foreach ($uris as $uri) {
            $this->uri[] = new Uri($uri);
        }
    }

    protected function expectedXmlElements(): array
    {
        return [Uri::NODE_NAME];
    }
}
