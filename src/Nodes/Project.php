<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Id;
use AdGroup\ReaxmlParser\Nodes\Order;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Project
{
    const NODE_NAME = "project";

    use HasNodeValidation;

    public ?Id $id = null;
    public ?Order $order = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Id::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->id = new Id($node[0]),
            Order::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->order = new Order($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
