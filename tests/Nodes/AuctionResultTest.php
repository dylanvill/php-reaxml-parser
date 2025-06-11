<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\AuctionResult;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class AuctionResultTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return AuctionResult::class;
    }

    public function test_type_is_null_when_type_attribute_is_not_present(): void
    {
        $xml = $this->generateXml(AuctionResult::NODE_NAME);
        $auctionResult = new AuctionResult($xml);

        $this->assertNull($auctionResult->type);
    }

    public function test_type_has_the_correct_value(): void
    {
        $xml = $this->generateXml(AuctionResult::NODE_NAME, ["type" => "sold-after-auction"]);
        $auctionResult = new AuctionResult($xml);

        $this->assertEquals("sold-after-auction", $auctionResult->type);
    }
}
