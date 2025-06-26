<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\FirstHomeBuyer;
use AdGroup\ReaxmlParser\Nodes\Investors;
use AdGroup\ReaxmlParser\Nodes\Downsizing;
use AdGroup\ReaxmlParser\Nodes\Couples;
use AdGroup\ReaxmlParser\Nodes\Students;
use AdGroup\ReaxmlParser\Nodes\LrgFamilies;
use AdGroup\ReaxmlParser\Nodes\Retirees;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class IdealFor
{
    const NODE_NAME = "idealFor";

    use HasNodeValidation, ParsesExtraElements;

    public ?FirstHomeBuyer $firstHomeBuyer = null;
    public ?Investors $investors = null;
    public ?Downsizing $downsizing = null;
    public ?Couples $couples = null;
    public ?Students $students = null;
    public ?LrgFamilies $lrgFamilies = null;
    public ?Retirees $retirees = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return array_keys($this->mapping());
    }

    private function mapping(): array
    {
        return [
            FirstHomeBuyer::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->firstHomeBuyer = new FirstHomeBuyer($node[0]),
            Investors::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->investors = new Investors($node[0]),
            Downsizing::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->downsizing = new Downsizing($node[0]),
            Couples::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->couples = new Couples($node[0]),
            Students::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->students = new Students($node[0]),
            LrgFamilies::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->lrgFamilies = new LrgFamilies($node[0]),
            Retirees::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->retirees = new Retirees($node[0]),
        ];
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = $this->mapping();

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
