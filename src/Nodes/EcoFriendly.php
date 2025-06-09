<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\SolarPanels;
use AdGroup\ReaxmlParser\Nodes\SolarHotWater;
use AdGroup\ReaxmlParser\Nodes\WaterTank;
use AdGroup\ReaxmlParser\Nodes\GreyWaterSystem;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class EcoFriendly
{
    const NODE_NAME = "ecoFriendly";

    use HasNodeValidation;

    public ?SolarPanels $solarPanels;
    public ?SolarHotWater $solarHotWater;
    public ?WaterTank $waterTank;
    public ?GreyWaterSystem $greyWaterSystem;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            SolarPanels::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->solarPanels = new SolarPanels($node[0]),
            SolarHotWater::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->solarHotWater = new SolarHotWater($node[0]),
            WaterTank::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->waterTank = new WaterTank($node[0]),
            GreyWaterSystem::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->greyWaterSystem = new GreyWaterSystem($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
