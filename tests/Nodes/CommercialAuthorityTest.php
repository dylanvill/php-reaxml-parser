<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\CommercialAuthority;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class CommercialAuthorityTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return CommercialAuthority::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(CommercialAuthority::NODE_NAME);
        $category = new CommercialAuthority($xml);

        $this->assertNull($category->value);
    }

    public function test_value_is_has_the_correct_value(): void
    {
        $xml = $this->generateXml(CommercialAuthority::NODE_NAME, ["value" => "auction"]);
        $category = new CommercialAuthority($xml);

        $this->assertEquals("auction", $category->value);
    }
}
