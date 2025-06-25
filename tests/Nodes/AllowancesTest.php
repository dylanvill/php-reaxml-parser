<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Allowances;
use AdGroup\ReaxmlParser\Nodes\Furnished;
use AdGroup\ReaxmlParser\Nodes\PetFriendly;
use AdGroup\ReaxmlParser\Nodes\Smokers;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use SimpleXMLElement;

class AllowancesTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeClass(): string
    {
        return Allowances::class;
    }

    protected function nodeName(): string
    {
        return Allowances::NODE_NAME;
    }

    public function test_all_properties_are_null_when_allowances_xml_is_empty(): void
    {
        $xml = $this->generateXml(Allowances::NODE_NAME);
        $allowances = new Allowances($xml);

        $this->assertNull($allowances->petFriendly);
        $this->assertNull($allowances->furnished);
        $this->assertNull($allowances->smokers);
    }

    public function test_pet_friendly_contains_the_correct_text_value(): void
    {
        $xml = $this->generateXml(Allowances::NODE_NAME, [], [
            [
                "name" => PetFriendly::NODE_NAME,
                "value" => "pet-friendly-test",
                "attributes" => []
            ]
        ]);
        $allowances = new Allowances($xml);

        $this->assertEquals("pet-friendly-test", $allowances->petFriendly->text);
    }

    public function test_furnished_contains_the_correct_text_value(): void
    {
        $xml = $this->generateXml(Allowances::NODE_NAME, [], [
            [
                "name" => Furnished::NODE_NAME,
                "value" => "furnished-test",
                "attributes" => []
            ]
        ]);
        $allowances = new Allowances($xml);

        $this->assertEquals("furnished-test", $allowances->furnished->text);
    }

    public function test_smokers_contains_the_correct_text_value(): void
    {
        $xml = $this->generateXml(Allowances::NODE_NAME, [], [
            [
                "name" => Smokers::NODE_NAME,
                "value" => "smokers-test",
                "attributes" => []
            ]
        ]);
        $allowances = new Allowances($xml);

        $this->assertEquals("smokers-test", $allowances->smokers->text);
    }
}
