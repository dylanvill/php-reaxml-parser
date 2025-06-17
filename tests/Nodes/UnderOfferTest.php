<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class UnderOfferTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return UnderOffer::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(UnderOffer::NODE_NAME);
        $underOffer = new UnderOffer($xml);

        $this->assertNull($underOffer->value);
    }

    public function test_type_is_instantiated_properly_when_there_is_a_type_attribute(): void
    {
        $xml = $this->generateXml(UnderOffer::NODE_NAME, ["value" => "yes"]);
        $underOffer = new UnderOffer($xml);

        $this->assertEquals(YesNoEnum::YES, $underOffer->value);
    }
}
