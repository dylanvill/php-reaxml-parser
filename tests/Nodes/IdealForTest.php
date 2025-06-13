<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\IdealFor;
use AdGroup\ReaxmlParser\Nodes\FirstHomeBuyer;
use AdGroup\ReaxmlParser\Nodes\Investors;
use AdGroup\ReaxmlParser\Nodes\Downsizing;
use AdGroup\ReaxmlParser\Nodes\Couples;
use AdGroup\ReaxmlParser\Nodes\Students;
use AdGroup\ReaxmlParser\Nodes\LrgFamilies;
use AdGroup\ReaxmlParser\Nodes\Retirees;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class IdealForTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return IdealFor::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return IdealFor::class;
    }

    public function test_properties_are_null_when_sub_elements_are_empty(): void
    {
        $propertyMap = [
            'firstHomeBuyer',
            'investors',
            'downsizing',
            'couples',
            'students',
            'lrgFamilies',
            'retirees',
        ];

        $xml = $this->generateXml(IdealFor::NODE_NAME);
        $idealFor = new IdealFor($xml);

        foreach ($propertyMap as $property) {
            $this->assertNull($idealFor->{$property});
        }
    }

    public function test_properties_are_instantiated_with_the_correct_instance_when_element_is_present(): void
    {
        $map = [
            FirstHomeBuyer::NODE_NAME => [
                "class" => FirstHomeBuyer::class,
                "property" => "firstHomeBuyer"
            ],
            Investors::NODE_NAME => [
                "class" => Investors::class,
                "property" => "investors"
            ],
            Downsizing::NODE_NAME => [
                "class" => Downsizing::class,
                "property" => "downsizing"
            ],
            Couples::NODE_NAME => [
                "class" => Couples::class,
                "property" => "couples"
            ],
            Students::NODE_NAME => [
                "class" => Students::class,
                "property" => "students"
            ],
            LrgFamilies::NODE_NAME => [
                "class" => LrgFamilies::class,
                "property" => "lrgFamilies"
            ],
            Retirees::NODE_NAME => [
                "class" => Retirees::class,
                "property" => "retirees"
            ],
        ];

        $elements = [];
        foreach ($map as $key => $value) {
            $elements[] = [
                "name" => $key,
                "attributes" => [],
                "value" => "test-value"
            ];
        }

        $xml = $this->generateXml(IdealFor::NODE_NAME, [], $elements);
        $idealFor = new IdealFor($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $idealFor->{$value["property"]});
        }
    }
}
