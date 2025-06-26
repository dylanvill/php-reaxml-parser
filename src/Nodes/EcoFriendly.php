<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\SolarPanels;
use AdGroup\ReaxmlParser\Nodes\SolarHotWater;
use AdGroup\ReaxmlParser\Nodes\WaterTank;
use AdGroup\ReaxmlParser\Nodes\GreyWaterSystem;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class EcoFriendly
{
    const NODE_NAME = "ecoFriendly";

    use HasNodeValidation, ParsesExtraElements;

    public ?SolarPanels $solarPanels = null;
    public ?SolarHotWater $solarHotWater = null;
    public ?WaterTank $waterTank = null;
    public ?GreyWaterSystem $greyWaterSystem = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
        $this->parseExtraElements($node);
    }

    private function mapping(): array
    {
        return [
            SolarPanels::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->solarPanels = new SolarPanels($node[0]),
            SolarHotWater::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->solarHotWater = new SolarHotWater($node[0]),
            WaterTank::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->waterTank = new WaterTank($node[0]),
            GreyWaterSystem::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->greyWaterSystem = new GreyWaterSystem($node[0]),
        ];
    }

    protected function expectedXmlElements(): array
    {
        return array_keys($this->mapping());
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = $this->mapping();

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
