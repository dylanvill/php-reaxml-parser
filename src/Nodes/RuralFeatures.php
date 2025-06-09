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
use SimpleXMLElement;

class RuralFeatures
{
    const NODE_NAME = "ruralFeatures";

    public ?Fencing $fencing = null;
    public ?AnnualRainfall $annualRainfall = null;
    public ?SoilTypes $soilTypes = null;
    public ?Improvements $improvements = null;
    public ?CouncilRates $councilRates = null;
    public ?Irrigation $irrigation = null;
    public ?CarryingCapacity $carryingCapacity = null;
    public ?Services $services = null;

    public function __construct(SimpleXMLElement $node) {}
}
