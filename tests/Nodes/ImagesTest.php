<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\Img;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ImagesTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Images::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Images::class;
    }

    public function test_img_is_null_when_there_is_no_child_element(): void
    {
        $xml = $this->generateXml(Images::NODE_NAME);
        $images = new Images($xml);

        $this->assertNull($images->img);
    }

    public function test_no_img_are_instantiated_when_the_img_child_elements_are_empty(): void
    {
        $xml = $this->generateXml(Images::NODE_NAME, [], [
            [
                "name" => Img::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $images = new Images($xml);

        $this->assertNull($images->img);
    }

    public function test_img_instantiates_only_valid_child_elements(): void
    {
        $xml = $this->generateXml(Images::NODE_NAME, [], [
            [
                "name" => Img::NODE_NAME,
                "value" => "",
                "attributes" => ["id" => "m"]
            ],
            [
                "name" => Img::NODE_NAME,
                "value" => "",
                "attributes" => ["id" => "a"]
            ],
            [
                "name" => Img::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $images = new Images($xml);

        $this->assertCount(2, $images->img);
    }
}
