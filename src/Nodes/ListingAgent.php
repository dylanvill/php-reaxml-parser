<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Contracts\MapsNodes;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Telephone;
use AdGroup\ReaxmlParser\Nodes\Email;
use AdGroup\ReaxmlParser\Nodes\TwitterUrl;
use AdGroup\ReaxmlParser\Nodes\FacebookUrl;
use AdGroup\ReaxmlParser\Nodes\LinkedInUrl;
use AdGroup\ReaxmlParser\Nodes\UniqueListingAgentId;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class ListingAgent
{
    const NODE_NAME = "listingAgent";

    use HasNodeValidation;

    /** Expected values: 1 - 4 */
    public ?int $id = null;
    public ?YesNoEnum $displayAgentProfile = null;

    public ?AgentId $agentId = null;
    public ?Name $name = null;
    /** @var Array<Telephone> */
    public ?array $telephone = null;
    public ?Email $email = null;
    public ?TwitterUrl $twitterUrl = null;
    public ?FacebookUrl $facebookUrl = null;
    public ?LinkedInUrl $linkedInUrl = null;
    public ?UniqueListingAgentId $uniqueListingAgentId = null;
    public ?Media $media = null;


    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);

        $attributes = $node->attributes();
        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
        $this->displayAgentProfile = empty($attributes->displayAgentProfile) ? null : YesNoEnum::parse($attributes->displayAgentProfile->__toString());
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            AgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->agentId = new AgentId($node[0]),
            Name::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->name = new Name($node[0]),
            Telephone::NODE_NAME => function (?array $node) {
                if (empty($node)) {
                    return null;
                }

                foreach ($node as $element) {
                    $this->telephone[] = new Telephone($element);
                }
            },
            Email::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->email = new Email($node[0]),
            TwitterUrl::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->twitterUrl = new TwitterUrl($node[0]),
            FacebookUrl::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->facebookUrl = new FacebookUrl($node[0]),
            LinkedInUrl::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->linkedInUrl = new LinkedInUrl($node[0]),
            UniqueListingAgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->uniqueListingAgentId = new UniqueListingAgentId($node[0]),
            Media::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->media = new Media($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
