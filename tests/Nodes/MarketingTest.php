<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Marketing;
use AdGroup\ReaxmlParser\Nodes\Upgrade;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class MarketingTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Marketing::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Marketing::class;
    }

    public function test_upgrade_is_null_when_there_is_no_upgrade_element(): void
    {
        $xml = $this->generateXml(Marketing::NODE_NAME);
        $marketing = new Marketing($xml);

        $this->assertNull($marketing->upgrade);
    }

    public function test_upgrade_is_instantiated_properly_when_there_is_an_upgrade_element(): void
    {
        $xml = $this->generateXml(Marketing::NODE_NAME, [], [
            [
                "name" => Upgrade::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $marketing = new Marketing($xml);

        $this->assertInstanceOf(Upgrade::class, $marketing->upgrade);
    }
}
