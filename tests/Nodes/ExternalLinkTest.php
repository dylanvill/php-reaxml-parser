<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ExternalLinkTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return ExternalLink::class;
    }

    public function test_href_is_null_when_there_is_no_href_attribute(): void
    {
        $xml = $this->generateXml(ExternalLink::NODE_NAME);
        $externalLink = new ExternalLink($xml);

        $this->assertNull($externalLink->href);
    }

    public function test_href_has_the_correct_value(): void
    {
        $xml = $this->generateXml(ExternalLink::NODE_NAME, ["href" => "href-test"]);
        $externalLink = new ExternalLink($xml);

        $this->assertEquals("href-test", $externalLink->href);
    }
}
