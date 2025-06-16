<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Fencing;
use AdGroup\ReaxmlParser\Nodes\AnnualRainfall;
use AdGroup\ReaxmlParser\Nodes\SoilTypes;
use AdGroup\ReaxmlParser\Nodes\Improvements;
use AdGroup\ReaxmlParser\Nodes\CouncilRates;
use AdGroup\ReaxmlParser\Nodes\Irrigation;
use AdGroup\ReaxmlParser\Nodes\CarryingCapacity;
use AdGroup\ReaxmlParser\Nodes\Services;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class RuralFeatures
{
    const NODE_NAME = "ruralFeatures";

    use HasNodeValidation;

    public ?Fencing $fencing = null;
    public ?AnnualRainfall $annualRainfall = null;
    public ?SoilTypes $soilTypes = null;
    public ?Improvements $improvements = null;
    public ?CouncilRates $councilRates = null;
    public ?Irrigation $irrigation = null;
    public ?CarryingCapacity $carryingCapacity = null;
    public ?Services $services = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Fencing::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->fencing = new Fencing($node[0]),
            AnnualRainfall::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->annualRainfall = new AnnualRainfall($node[0]),
            SoilTypes::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->soilTypes = new SoilTypes($node[0]),
            Improvements::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->improvements = new Improvements($node[0]),
            CouncilRates::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->councilRates = new CouncilRates($node[0]),
            Irrigation::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->irrigation = new Irrigation($node[0]),
            CarryingCapacity::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->carryingCapacity = new CarryingCapacity($node[0]),
            Services::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->services = new Services($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
