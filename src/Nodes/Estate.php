<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Stage;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Estate
{
    const NODE_NAME = "estate";

    use HasNodeValidation, ParsesExtraElements;

    public ?Name $name = null;
    public ?Stage $stage = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
        $this->parseExtraElements($node);
    }

    private function mapping(): array
    {
        return [
            Name::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->name = new Name($node[0]),
            Stage::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->stage = new Stage($node[0]),
        ];
    }

    protected function expectedXmlElements(): array
    {
        return array_keys($this->mapping());
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = $this->mapping();

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
