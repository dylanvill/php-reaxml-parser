<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\City;
use App\ReaXml\Nodes\Water;
use App\ReaXml\Nodes\Valley;
use App\ReaXml\Nodes\Mountain;
use App\ReaXml\Nodes\Ocean;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class Views
{
    const NODE_NAME = "views";

    use HasNodeValidation;

    public ?City $city = null;
    public ?Water $water = null;
    public ?Valley $valley = null;
    public ?Mountain $mountain = null;
    public ?Ocean $ocean = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            City::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->city = new City($node[0]),
            Water::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->water = new Water($node[0]),
            Valley::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->valley = new Valley($node[0]),
            Mountain::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->mountain = new Mountain($node[0]),
            Ocean::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ocean = new Ocean($node[0])
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
