<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\Range;
use App\ReaXml\Nodes\Price;
use App\ReaXml\Nodes\SoldPrice;
use App\ReaXml\Nodes\Date;
use App\ReaXml\Nodes\SoldDate;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class SoldDetails
{
    const NODE_NAME = "soldDetails";

    use HasNodeValidation;

    public ?Price $price = null;
    public ?SoldPrice $soldPrice = null;
    public ?Date $date = null;
    public ?SoldDate $soldDate = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Price::NODE_NAME => fn(?array $node) => empty($node) ? $this->price = null : $this->price = new Price($node[0]),
            SoldPrice::NODE_NAME => fn(?array $node) => empty($node) ? $this->soldPrice = null : $this->soldPrice = new SoldPrice($node[0]),
            Date::NODE_NAME => fn(?array $node) => empty($node) ? $this->date = null : $this->date = new Date($node[0]),
            SoldDate::NODE_NAME => fn(?array $node) => empty($node) ? $this->soldDate = null : $this->soldDate = new SoldDate($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
