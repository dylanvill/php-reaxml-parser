<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Attachment;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class MediaTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Media::class;
    }

    public function test_attachment_is_null_when_there_is_no_attachment_sub_elements(): void
    {
        $xml = $this->generateXml(Media::NODE_NAME);
        $media = new Media($xml);

        $this->assertNull($media->attachment);
    }

    public function test_attachment_is_an_array_even_if_only_one_attachment_element_is_present(): void
    {
        $xml = $this->generateXml(Media::NODE_NAME, [], [
            [
                "name" => Attachment::NODE_NAME,
                "attributes" => [],
                "value" => "attachment-test"
            ]
        ]);
        $media = new Media($xml);

        $this->assertIsArray($media->attachment);
    }

    public function test_attachments_are_instantiated_as_an_array_of_attachment_classes(): void
    {
        $xml = $this->generateXml(Media::NODE_NAME, [], [
            [
                "name" => Attachment::NODE_NAME,
                "attributes" => [],
                "value" => "attachment-test"
            ],
            [
                "name" => Attachment::NODE_NAME,
                "attributes" => [],
                "value" => "attachment-test"
            ],
            [
                "name" => Attachment::NODE_NAME,
                "attributes" => [],
                "value" => "attachment-test"
            ],
        ]);
        $media = new Media($xml);

        foreach ($media->attachment as $attachment) {
            $this->assertInstanceOf(Attachment::class, $attachment);
        }
    }
}
