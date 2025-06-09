<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\Inspection;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class InspectionTimes
{
    const NODE_NAME = "inspectionTimes";

    use HasNodeValidation;

    /** @var Array<Inspection> */
    public ?array $inspection = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $inspections = $node->xpath(Inspection::NODE_NAME);

        if (!empty($inspections)) {
            foreach ($inspections as $inspection) {
                if (!empty($inspection)) {
                    $this->inspection[] = new Inspection($inspection);
                }
            }
        }
    }
}
