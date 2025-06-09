<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\FirstHomeBuyer;
use App\ReaXml\Nodes\Investors;
use App\ReaXml\Nodes\Downsizing;
use App\ReaXml\Nodes\Couples;
use App\ReaXml\Nodes\Students;
use App\ReaXml\Nodes\LrgFamilies;
use App\ReaXml\Nodes\Retirees;
use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class IdealFor
{
    const NODE_NAME = "idealFor";

    use HasText, HasNodeValidation;

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
        $this->assignNodeToText($node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            FirstHomeBuyer::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->firstHomeBuyer = new FirstHomeBuyer($node[0]),
            Investors::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->investors = new Investors($node[0]),
            Downsizing::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->downsizing = new Downsizing($node[0]),
            Couples::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->couples = new Couples($node[0]),
            Students::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->students = new Students($node[0]),
            LrgFamilies::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->lrgFamilies = new LrgFamilies($node[0]),
            Retirees::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->retirees = new Retirees($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
