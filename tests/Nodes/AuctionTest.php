<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Auction;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class AuctionTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Auction::class;
    }

    public function test_date_is_null_when_there_is_no_date_attribute(): void
    {
        $xml = $this->generateXml(Auction::NODE_NAME);
        $auction = new Auction($xml);

        $this->assertNull($auction->date);
    }

    public function test_date_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Auction::NODE_NAME, ["date" => "date-value"]);
        $auction = new Auction($xml);

        $this->assertEquals("date-value", $auction->date);
    }
}
