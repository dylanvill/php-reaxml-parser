<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\HotWaterService;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class HotWaterServiceTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return HotWaterService::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return HotWaterService::class;
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(HotWaterService::NODE_NAME);
        $service = new HotWaterService($xml);

        $this->assertNull($service->type);
    }

    public function test_name_has_the_correct_value(): void
    {
        $xml = $this->generateXml(HotWaterService::NODE_NAME, ["type" => "gas"]);
        $service = new HotWaterService($xml);

        $this->assertEquals("gas", $service->type);
    }
}
