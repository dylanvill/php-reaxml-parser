<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\Fencing;
use App\ReaXml\Nodes\AnnualRainfall;
use App\ReaXml\Nodes\SoilTypes;
use App\ReaXml\Nodes\Improvements;
use App\ReaXml\Nodes\CouncilRates;
use App\ReaXml\Nodes\Irrigation;
use App\ReaXml\Nodes\CarryingCapacity;
use App\ReaXml\Nodes\Services;
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
