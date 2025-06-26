<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\City;
use AdGroup\ReaxmlParser\Nodes\Water;
use AdGroup\ReaxmlParser\Nodes\Valley;
use AdGroup\ReaxmlParser\Nodes\Mountain;
use AdGroup\ReaxmlParser\Nodes\Ocean;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ViewsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Views::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Views::class;
    }

    public function test_properties_are_null_when_there_are_no_child_elements(): void
    {
        $properties = ["city", "water", "valley", "mountain", "ocean"];

        $xml = $this->generateXml(Views::NODE_NAME);
        $views = new Views($xml);

        foreach ($properties as $property) {
            $this->assertNull($views->{$property});
        }
    }

    public function test_properties_are_instantiated_correctly_when_child_elements_are_present(): void
    {
        $map = [
            City::NODE_NAME => ["class" => City::class, "property" => "city"],
            Water::NODE_NAME => ["class" => Water::class, "property" => "water"],
            Valley::NODE_NAME => ["class" => Valley::class, "property" => "valley"],
            Mountain::NODE_NAME => ["class" => Mountain::class, "property" => "mountain"],
            Ocean::NODE_NAME => ["class" => Ocean::class, "property" => "ocean"],
        ];

        $childNodes = [];
        foreach ($map as $key => $value) {
            $childNodes[] = [
                "name" => $key,
                "attributes" => [],
                "value" => "test-value"
            ];
        }

        $xml = $this->generateXml(Views::NODE_NAME, [], $childNodes);
        $views = new Views($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $views->{$value["property"]});
        }
    }
}
