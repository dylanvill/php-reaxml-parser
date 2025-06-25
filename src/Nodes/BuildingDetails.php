<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Area;
use AdGroup\ReaxmlParser\Nodes\EnergyRating;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class BuildingDetails
{
    const NODE_NAME = "buildingDetails";

    use HasNodeValidation, ParsesExtraElements;

    public ?Area $area = null;
    public ?EnergyRating $energyRating = null;

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
            Area::NODE_NAME => fn(?array $node) => empty($node) ? $this->area = null : $this->area = new Area($node[0]),
            EnergyRating::NODE_NAME => fn(?array $node) => empty($node) ? $this->energyRating = null : $this->energyRating = new EnergyRating($node[0]),
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
