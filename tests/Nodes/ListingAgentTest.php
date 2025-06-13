<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Email;
use AdGroup\ReaxmlParser\Nodes\TwitterUrl;
use AdGroup\ReaxmlParser\Nodes\FacebookUrl;
use AdGroup\ReaxmlParser\Nodes\LinkedInUrl;
use AdGroup\ReaxmlParser\Nodes\UniqueListingAgentId;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ListingAgentTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return ListingAgent::class;
    }

    public function test_all_elements_are_null_when_nochild_elements_are_present(): void
    {
        $elements = [
            'agentId',
            'name',
            'telephone',
            'email',
            'twitterUrl',
            'facebookUrl',
            'linkedInUrl',
            'uniqueListingAgentId',
            'media',
        ];

        $xml = $this->generateXml(ListingAgent::NODE_NAME);
        $listingAgent = new ListingAgent($xml);

        foreach ($elements as $property) {
            $this->assertNull($listingAgent->{$property});
        }
    }

    public function test_all_elements_are_instantiated_properly_when_they_are_present_and_have_a_value(): void
    {
        $map = [
            AgentId::NODE_NAME => [
                "class" => AgentId::class,
                "property" => "agentId"
            ],
            Name::NODE_NAME => [
                "class" => Name::class,
                "property" => "name"
            ],
            Email::NODE_NAME => [
                "class" => Email::class,
                "property" => "email"
            ],
            TwitterUrl::NODE_NAME => [
                "class" => TwitterUrl::class,
                "property" => "twitterUrl"
            ],
            FacebookUrl::NODE_NAME => [
                "class" => FacebookUrl::class,
                "property" => "facebookUrl"
            ],
            LinkedInUrl::NODE_NAME => [
                "class" => LinkedInUrl::class,
                "property" => "linkedInUrl"
            ],
            UniqueListingAgentId::NODE_NAME => [
                "class" => UniqueListingAgentId::class,
                "property" => "uniqueListingAgentId"
            ],
            Media::NODE_NAME => [
                "class" => Media::class,
                "property" => "media"
            ],
        ];

        $xmlNodes = [];
        foreach ($map as $key => $value) {
            $xmlNodes[] = [
                "name" => $key,
                "value" => "test",
                "attributes" => []
            ];
        }

        $xml = $this->generateXml(ListingAgent::NODE_NAME, [], $xmlNodes);
        $listingAgent = new ListingAgent($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $listingAgent->{$value["property"]});
        }
    }

    public function test_id_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(ListingAgent::NODE_NAME);
        $listingAgent = new ListingAgent($xml);

        $this->assertNull($listingAgent->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(ListingAgent::NODE_NAME, ["id" => "1"]);
        $listingAgent = new ListingAgent($xml);

        $this->assertEquals(1, $listingAgent->id);
    }

    public function test_display_agent_profile_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(ListingAgent::NODE_NAME);
        $listingAgent = new ListingAgent($xml);

        $this->assertNull($listingAgent->displayAgentProfile);
    }

    public function test_display_agent_profile_has_the_correct_value(): void
    {
        $xml = $this->generateXml(ListingAgent::NODE_NAME, ["displayAgentProfile" => "yes"]);
        $listingAgent = new ListingAgent($xml);

        $this->assertEquals(YesNoEnum::YES, $listingAgent->displayAgentProfile);
    }
}
