<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class RuralCategory
{
    const NODE_NAME = "ruralCategory";

    /** Expected values: "Cropping|Dairy|Farmlet|Horticulture|Livestock|Viticulture|MixedFarming|Lifestyle|Other" */
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node) {}
}
