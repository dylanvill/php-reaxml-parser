<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class VideoLinkTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return VideoLink::class;
    }

    public function test_href_is_null_when_there_is_no_href_attribute(): void
    {
        $xml = $this->generateXml(VideoLink::NODE_NAME);
        $videoLink = new VideoLink($xml);

        $this->assertNull($videoLink->href);
    }

    public function test_href_has_the_correct_value(): void
    {
        $xml = $this->generateXml(VideoLink::NODE_NAME, ["href" => "href-test"]);
        $videoLink = new VideoLink($xml);

        $this->assertEquals("href-test", $videoLink->href);
    }
}
