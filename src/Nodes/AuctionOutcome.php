<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\AuctionResult;
use AdGroup\ReaxmlParser\Nodes\AuctionDate;
use AdGroup\ReaxmlParser\Nodes\AuctionMaxBid;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class AuctionOutcome
{
    const NODE_NAME = "auctionOutcome";

    use HasNodeValidation;

    public ?AuctionResult $auctionResult;
    public ?AuctionDate $auctionDate;
    public ?AuctionMaxBid $auctionMaxBid;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            AuctionResult::NODE_NAME => fn(?array $node) => empty($node) ? $this->auctionResult = null : $this->auctionResult = new AuctionResult($node[0]),
            AuctionDate::NODE_NAME => fn(?array $node) => empty($node) ? $this->auctionDate = null : $this->auctionDate = new AuctionDate($node[0]),
            AuctionMaxBid::NODE_NAME => fn(?array $node) => empty($node) ? $this->auctionMaxBid = null : $this->auctionMaxBid = new AuctionMaxBid($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
