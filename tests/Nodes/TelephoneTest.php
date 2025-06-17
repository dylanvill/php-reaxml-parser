<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Telephone;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class TelephoneTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Telephone::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Telephone::class;
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(Telephone::NODE_NAME);
        $telephone = new Telephone($xml);

        $this->assertNull($telephone->type);
    }

    public function test_type_is_instantiated_properly_when_there_is_a_type_attribute(): void
    {
        $xml = $this->generateXml(Telephone::NODE_NAME, ["type" => "mobile"]);
        $telephone = new Telephone($xml);

        $this->assertEquals("mobile", $telephone->type);
    }
}
