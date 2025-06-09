<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\Area;
use App\ReaXml\Nodes\Frontage;
use App\ReaXml\Nodes\Depth;
use App\ReaXml\Nodes\CrossOver;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class LandDetails
{
    const NODE_NAME = "landDetails";

    use HasNodeValidation;

    public ?Area $area = null;
    public ?Frontage $frontage = null;
    /** @var Array<Depth>|null */
    public ?array $depth = null;
    public ?CrossOver $crossOver = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Area::NODE_NAME => fn(?array $node) => empty($node) ? $this->area = null : $this->area = new Area($node[0]),
            Frontage::NODE_NAME => fn(?array $node) => empty($node) ? $this->frontage = null : $this->frontage = new Frontage($node[0]),
            Depth::NODE_NAME => function (?array $node) {
                if (empty($node)) {
                    $this->depth = null;
                }

                foreach ($node as $element) {
                    $this->depth[] = new Depth($element);
                }
            },
            CrossOver::NODE_NAME => fn(?array $node) => empty($node) ? $this->crossOver = null : $this->crossOver = new CrossOver($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
