<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Email;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class EmailTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Email::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Email::class;
    }

    public function test_receive_campaign_report_is_null_when_receive_campaign_report_attribute_is_not_present(): void
    {
        $xml = $this->generateXml(Email::NODE_NAME);
        $eField = new Email($xml);

        $this->assertNull($eField->receiveCampaignReport);
    }

    public function test_receive_campaign_report_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Email::NODE_NAME, ["receiveCampaignReport" => "yes"]);
        $eField = new Email($xml);

        $this->assertEquals(YesNoEnum::YES, $eField->receiveCampaignReport);
    }
}
