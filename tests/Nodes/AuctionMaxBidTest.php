<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\AuctionMaxBid;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class AuctionMaxBidTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return AuctionMaxBid::class;
    }

    protected function test_value_is_null_when_value_attribute_is_not_present(): void
    {
        $xml = $this->generateXml(AuctionMaxBid::NODE_NAME);
        $auctionMaxBid = new AuctionMaxBid($xml);

        $this->assertNull($auctionMaxBid->value);
    }

    protected function test_value_is_correct(): void
    {
        $xml = $this->generateXml(AuctionMaxBid::NODE_NAME, ["value" => "test-value"]);
        $auctionMaxBid = new AuctionMaxBid($xml);

        $this->assertEquals("test-value", $auctionMaxBid->value);
    }
}
