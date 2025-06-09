<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Area;
use AdGroup\ReaxmlParser\Nodes\EnergyRating;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class BuildingDetails
{
    const NODE_NAME = "buildingDetails";

    use HasNodeValidation;

    public ?Area $area;
    public ?EnergyRating $energyRating;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Area::NODE_NAME => fn(?array $node) => empty($node) ? $this->area = null : $this->area = new Area($node[0]),
            EnergyRating::NODE_NAME => fn(?array $node) => empty($node) ? $this->energyRating = null : $this->energyRating = new EnergyRating($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
