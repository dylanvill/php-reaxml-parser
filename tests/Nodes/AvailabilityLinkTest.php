<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\AvailabilityLink;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class AvailabilityLinkTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return AvailabilityLink::class;
    }

    public function test_href_is_null_when_there_is_no_href_attribute(): void
    {
        $xml = $this->generateXml(AvailabilityLink::NODE_NAME);
        $link = new AvailabilityLink($xml);

        $this->assertNull($link->href);
    }

    public function test_href_has_the_correct_value(): void
    {
        $xml = $this->generateXml(AvailabilityLink::NODE_NAME, ["href" => "href-sample"]);
        $authority = new AvailabilityLink($xml);

        $this->assertEquals("href-sample", $authority->href);
    }
}
