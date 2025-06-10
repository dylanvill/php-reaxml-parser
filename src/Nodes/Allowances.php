<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\PetFriendly;
use AdGroup\ReaxmlParser\Nodes\Furnished;
use AdGroup\ReaxmlParser\Nodes\Smokers;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Allowances
{
    const NODE_NAME = "allowances";

    use HasNodeValidation;

    public ?PetFriendly $petFriendly = null;
    public ?Furnished $furnished = null;
    public ?Smokers $smokers = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            PetFriendly::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->petFriendly = new PetFriendly($node[0]),
            Furnished::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->furnished = new Furnished($node[0]),
            Smokers::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->smokers = new Smokers($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
