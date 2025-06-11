<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class AuthorityTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Authority::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(Authority::NODE_NAME);
        $authority = new Authority($xml);

        $this->assertNull($authority->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Authority::NODE_NAME, ["value" => "auction"]);
        $authority = new Authority($xml);

        $this->assertEquals("auction", $authority->value);
    }
}
