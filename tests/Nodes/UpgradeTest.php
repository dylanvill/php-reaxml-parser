<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Presentation;
use AdGroup\ReaxmlParser\Nodes\Upgrade;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class UpgradeTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Upgrade::class;
    }

    public function test_presentation_is_null_when_presentation_element_is_missing(): void
    {
        $xml = $this->generateXml(Upgrade::NODE_NAME);
        $upgrade = new Upgrade($xml);

        $this->assertNull($upgrade->presentation);
    }

    public function test_presentation_is_instantiated_properly_when_the_presentation_element_is_present(): void
    {
        $xml = $this->generateXml(Upgrade::NODE_NAME, [], [
            [
                "name" => Presentation::NODE_NAME,
                "attributes" => [],
                "value" => "presentation-test"
            ]
        ]);
        $upgrade = new Upgrade($xml);

        $this->assertInstanceOf(Presentation::class, $upgrade->presentation);
    }
}
