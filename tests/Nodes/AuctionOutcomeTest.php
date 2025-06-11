<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\AuctionDate;
use AdGroup\ReaxmlParser\Nodes\AuctionMaxBid;
use AdGroup\ReaxmlParser\Nodes\AuctionOutcome;
use AdGroup\ReaxmlParser\Nodes\AuctionResult;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class AuctionOutcomeTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return AuctionMaxBid::class;
    }

    public function test_all_properties_are_null_when_there_is_no_child_nodes()
    {
        $xml = $this->generateXml(AuctionOutcome::NODE_NAME);
        $auctionOutcome = new AuctionOutcome($xml);

        $this->assertNull($auctionOutcome->auctionResult);
        $this->assertNull($auctionOutcome->auctionDate);
        $this->assertNull($auctionOutcome->auctionMaxBid);
    }

    public function test_auction_result_has_correct_value()
    {
        $xml = $this->generateXml(AuctionOutcome::NODE_NAME, [], [
            [
                "name" => AuctionResult::NODE_NAME,
                "value" => "",
                "attributes" => [
                    "type" => "sold-prior-to-auction"
                ]
            ]
        ]);
        $auctionOutcome = new AuctionOutcome($xml);

        $this->assertEquals("sold-prior-to-auction", $auctionOutcome->auctionResult->type);
    }

    public function test_auction_date_has_correct_value()
    {
        $xml = $this->generateXml(AuctionOutcome::NODE_NAME, [], [
            [
                "name" => AuctionDate::NODE_NAME,
                "value" => "auction-date-value",
                "attributes" => []
            ]
        ]);
        $auctionOutcome = new AuctionOutcome($xml);

        $this->assertEquals("auction-date-value", $auctionOutcome->auctionDate->text);
    }

    public function test_auction_max_bid_date_has_correct_value()
    {
        $xml = $this->generateXml(AuctionOutcome::NODE_NAME, [], [
            [
                "name" => AuctionMaxBid::NODE_NAME,
                "value" => "",
                "attributes" => [
                    "value" => "max-bid-value"
                ]
            ]
        ]);
        $auctionOutcome = new AuctionOutcome($xml);

        $this->assertEquals("max-bid-value", $auctionOutcome->auctionMaxBid->value);
    }
}
