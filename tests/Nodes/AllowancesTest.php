<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Allowances;
use AdGroup\ReaxmlParser\Nodes\Furnished;
use AdGroup\ReaxmlParser\Nodes\PetFriendly;
use AdGroup\ReaxmlParser\Nodes\Smokers;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use SimpleXMLElement;

class AllowancesTest extends TestCase
{
    use TestsNodeValidation;

    const TEST_VALUE = "yes";

    private function generateAllowancesXml(array $childElements = []): SimpleXMLElement
    {
        $content = "<allowances>";

        foreach ($childElements as $key => $value) {
            $content .= "<{$key}>{$value}</{$key}>";
        }
        $content .= "</allowances>";

        return simplexml_load_string($content);
    }

    public function nodeClass(): string
    {
        return Allowances::class;
    }

    public function test_all_properties_are_null_when_allowances_xml_is_empty(): void
    {
        $xml = $this->generateAllowancesXml();
        $allowances = new Allowances($xml);

        $this->assertNull($allowances->petFriendly);
        $this->assertNull($allowances->furnished);
        $this->assertNull($allowances->smokers);
    }

    public function test_pet_friendly_contains_the_correct_text_value(): void
    {
        $xml = $this->generateAllowancesXml([PetFriendly::NODE_NAME => self::TEST_VALUE]);
        $allowances = new Allowances($xml);

        $this->assertEquals(self::TEST_VALUE, $allowances->petFriendly->text);
    }

    public function test_furnished_contains_the_correct_text_value(): void
    {
        $xml = $this->generateAllowancesXml([Furnished::NODE_NAME => self::TEST_VALUE]);
        $allowances = new Allowances($xml);

        $this->assertEquals(self::TEST_VALUE, $allowances->furnished->text);
    }

    public function test_smokers_contains_the_correct_text_value(): void
    {
        $xml = $this->generateAllowancesXml([Smokers::NODE_NAME => self::TEST_VALUE]);
        $allowances = new Allowances($xml);

        $this->assertEquals(self::TEST_VALUE, $allowances->smokers->text);
    }
}
