<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\EField;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class ExtraFields
{
    const NODE_NAME = "extraFields";

    use HasNodeValidation;

    public ?string $table = null;

    /** @var array<EField> */
    public ?array $eField = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            EField::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->eField[] = new EField($element);
                    }
                }
            },
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
