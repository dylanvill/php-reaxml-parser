<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Area;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class AreaTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    public function nodeName(): string
    {
        return 'area';
    }

    public function nodeClass(): string
    {
        return Area::class;
    }

    public function test_range_is_null_when_range_is_empty(): void
    {
        $xml = $this->generateXml('area');
        $area = new Area($xml);

        $this->assertNull($area->range);
    }

    public function test_unit_is_null_when_there_is_no_unit_attribute(): void
    {
        $xml = $this->generateXml('area');
        $area = new Area($xml);

        $this->assertNull($area->unit);
    }

    public function test_unit_is_not_null_when_there_is_a_unit_attribute(): void
    {
        $xml = $this->generateXml('area', ['unit' => 'square']);
        $area = new Area($xml);

        $this->assertEquals('square', $area->unit);
    }

    public function test_of_is_null_when_there_is_no_of_attribute(): void
    {
        $xml = $this->generateXml('area');
        $area = new Area($xml);

        $this->assertNull($area->of);
    }

    public function test_of_is_not_null_when_there_is_an_of_attribute(): void
    {
        $xml = $this->generateXml('area', ['of' => 'total']);
        $area = new Area($xml);

        $this->assertEquals('total', $area->of);
    }
}
