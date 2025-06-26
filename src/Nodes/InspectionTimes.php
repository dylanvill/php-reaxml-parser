<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Inspection;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class InspectionTimes
{
    const NODE_NAME = "inspectionTimes";

    use HasNodeValidation, ParsesExtraElements;

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
        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return [Inspection::NODE_NAME];
    }
}
