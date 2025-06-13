<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\IsHomeLandPackage;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class IsHomeLandPackageTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return IsHomeLandPackage::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return IsHomeLandPackage::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(IsHomeLandPackage::NODE_NAME);
        $isHomeLandPackage = new IsHomeLandPackage($xml);

        $this->assertNull($isHomeLandPackage->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(IsHomeLandPackage::NODE_NAME, ["value" => "yes"]);
        $isHomeLandPackage = new IsHomeLandPackage($xml);

        $this->assertEquals(YesNoEnum::YES, $isHomeLandPackage->value);
    }
}
