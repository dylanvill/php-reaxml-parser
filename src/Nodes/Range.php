<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\Min;
use App\ReaXml\Nodes\Max;
use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Range
{
    const NODE_NAME = "range";

    use HasNodeValidation;

    public ?Min $min = null;
    public ?Max $max = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Min::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->min = new Min($node[0]),
            Max::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->max = new Max($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
