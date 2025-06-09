<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Nodes\Page;
use App\ReaXml\Nodes\Reference;
use SimpleXMLElement;

class StreetDirectory
{
    const NODE_NAME = "streetDirectory";

    use HasNodeValidation;

    /** Expected values: "melways|UBD" */
    public ?string $type = null;

    public ?Page $page = null;
    public ?Reference $reference = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);

        $attributes = $node->attributes();
        $this->type = $attributes->type->__toString();
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Page::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->page = new Page($node[0]),
            Reference::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->reference = new Reference($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
