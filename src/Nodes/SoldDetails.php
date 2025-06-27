<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\SoldPrice;
use AdGroup\ReaxmlParser\Nodes\Date;
use AdGroup\ReaxmlParser\Nodes\SoldDate;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class SoldDetails
{
    const NODE_NAME = "soldDetails";

    use HasNodeValidation, ParsesExtraElements;

    public ?Price $price = null;
    public ?SoldPrice $soldPrice = null;
    public ?Date $date = null;
    public ?SoldDate $soldDate = null;

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
            Price::NODE_NAME => fn(?array $node) => empty($node) ? $this->price = null : $this->price = new Price($node[0]),
            SoldPrice::NODE_NAME => fn(?array $node) => empty($node) ? $this->soldPrice = null : $this->soldPrice = new SoldPrice($node[0]),
            Date::NODE_NAME => fn(?array $node) => empty($node) ? $this->date = null : $this->date = new Date($node[0]),
            SoldDate::NODE_NAME => fn(?array $node) => empty($node) ? $this->soldDate = null : $this->soldDate = new SoldDate($node[0]),
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
