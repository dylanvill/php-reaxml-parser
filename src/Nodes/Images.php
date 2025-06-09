<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\Img;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class Images
{
    const NODE_NAME = "images";

    use HasNodeValidation;

    /** @var Array<Img> */
    public ?array $imgs = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $imgs = $node->xpath(Img::NODE_NAME);

        foreach ($imgs as $element) {
            if (!empty($element)) {
                $this->imgs[] = new Img($element);
            }
        }
    }
}
