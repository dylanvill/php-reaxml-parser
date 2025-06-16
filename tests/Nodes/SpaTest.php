<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Spa;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class SpaTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Spa::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Spa::class;
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(Spa::NODE_NAME);
        $spa = new Spa($xml);

        $this->assertNull($spa->type);
    }

    public function test_type_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Spa::NODE_NAME, ["type" => "inground"]);
        $spa = new Spa($xml);

        $this->assertEquals("inground", $spa->type);
    }
}
