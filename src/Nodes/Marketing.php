<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Marketing
{
    const NODE_NAME = "marketing";

    use HasNodeValidation, ParsesExtraElements;

    public ?Upgrade $upgrade = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);

        $element = $node->xpath(Upgrade::NODE_NAME);
        if (!empty($element)) {
            $this->upgrade = new Upgrade($element[0]);
        }

        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return [Upgrade::NODE_NAME];
    }
}
