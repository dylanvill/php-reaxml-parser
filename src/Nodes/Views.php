<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\City;
use AdGroup\ReaxmlParser\Nodes\Water;
use AdGroup\ReaxmlParser\Nodes\Valley;
use AdGroup\ReaxmlParser\Nodes\Mountain;
use AdGroup\ReaxmlParser\Nodes\Ocean;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Views
{
    const NODE_NAME = "views";

    use HasNodeValidation, ParsesExtraElements;

    public ?City $city = null;
    public ?Water $water = null;
    public ?Valley $valley = null;
    public ?Mountain $mountain = null;
    public ?Ocean $ocean = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return array_keys($this->mapping());
    }

    private function mapping(): array
    {
        return [
            City::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->city = new City($node[0]),
            Water::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->water = new Water($node[0]),
            Valley::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->valley = new Valley($node[0]),
            Mountain::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->mountain = new Mountain($node[0]),
            Ocean::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ocean = new Ocean($node[0])
        ];
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = $this->mapping();

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
