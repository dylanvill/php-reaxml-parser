<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\DepositTaken;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class DepositTakenTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return DepositTaken::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(DepositTaken::NODE_NAME);
        $depositTaken = new DepositTaken($xml);

        $this->assertNull($depositTaken->value);
    }

    public function test_value_is_correct(): void
    {
        $xml = $this->generateXml(DepositTaken::NODE_NAME, ["value" => "yes"]);
        $depositTaken = new DepositTaken($xml);

        $this->assertEquals(YesNoEnum::YES, $depositTaken->value);
    }
}
