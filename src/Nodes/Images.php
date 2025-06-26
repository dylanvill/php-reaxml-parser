<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Img;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Images
{
    const NODE_NAME = "images";

    use HasNodeValidation, ParsesExtraElements;

    /** @var Array<Img> */
    public ?array $img = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $imgs = $node->xpath(Img::NODE_NAME);

        foreach ($imgs as $element) {
            if (!empty($element)) {
                $this->img[] = new Img($element);
            }
        }

        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return [Img::NODE_NAME];
    }
}
