<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\IsHomeLandPackage;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\Category;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\Auction;
use AdGroup\ReaxmlParser\Nodes\AuctionOutcome;
use AdGroup\ReaxmlParser\Nodes\VendorDetails;
use AdGroup\ReaxmlParser\Nodes\YearBuilt;
use AdGroup\ReaxmlParser\Nodes\YearLastRenovated;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\NewConstruction;
use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\IdealFor;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Nodes\Project;
use SimpleXMLElement;

#[\AllowDynamicProperties]
class Residential implements ListingType
{
    const NODE_NAME = "residential";

    public ?string $modTime = null;
    public ?ListingStatusEnum $status = null;

    public ?AgentId $agentId = null;
    public ?UniqueId $uniqueId = null;
    public ?Authority $authority = null;
    public ?UnderOffer $underOffer = null;
    public ?IsHomeLandPackage $isHomeLandPackage = null;
    /** @var Array<ListingAgent> */
    public ?array $listingAgent = null;
    public ?Price $price = null;
    public ?PriceView $priceView = null;
    public ?Address $address = null;
    public ?Municipality $municipality = null;
    public ?StreetDirectory $streetDirectory = null;
    public ?Category $category = null;
    public ?Headline $headline = null;
    public ?Description $description = null;
    public ?Features $features = null;
    public ?SoldDetails $soldDetails = null;
    public ?LandDetails $landDetails = null;
    public ?BuildingDetails $buildingDetails = null;
    public ?InspectionTimes $inspectionTimes = null;
    public ?Auction $auction = null;
    public ?AuctionOutcome $auctionOutcome = null;
    /** @var Array<VendorDetails> */
    public ?array $vendorDetails = null;
    public ?YearBuilt $yearBuilt = null;
    public ?YearLastRenovated $yearLastRenovated = null;
    /** @var Array<ExternalLink> */
    public ?array $externalLink = null;
    public ?VideoLink $videoLink = null;
    public ?ExtraFields $extraFields = null;
    public ?Images $images = null;
    public ?NewConstruction $newConstruction = null;
    public ?EcoFriendly $ecoFriendly = null;
    public ?IdealFor $idealFor = null;
    public ?Views $views = null;
    public ?Objects $objects = null;
    public ?Media $media = null;
    public ?Project $project = null;

    public array $mapping = [];

    public function __construct(protected SimpleXMLElement $node)
    {
        $this->mapInitialNotes($node);

        $attributes = $node->attributes();
        $this->modTime = empty($attributes->modTime) ? null : $attributes->modTime->__toString();
        $this->status = empty($attributes->status) ? null : ListingStatusEnum::tryFrom($attributes->status->__toString());
    }

    private function mapInitialNotes(SimpleXMLElement $node): void
    {
        $this->mapping = [
            AgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->agentId = new AgentId($node[0]),
            UniqueId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->uniqueId = new UniqueId($node[0]),
            Authority::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->authority = new Authority($node[0]),
            UnderOffer::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->underOffer = new UnderOffer($node[0]),
            IsHomeLandPackage::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->isHomeLandPackage = new IsHomeLandPackage($node[0]),
            ListingAgent::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->listingAgent[] = new ListingAgent($element);
                    }
                }
            },
            Price::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->price = new Price($node[0]),
            PriceView::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->priceView = new PriceView($node[0]),
            Address::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->address = new Address($node[0]),
            Municipality::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->municipality = new Municipality($node[0]),
            StreetDirectory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->streetDirectory = new StreetDirectory($node[0]),
            Category::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->category = new Category($node[0]),
            Headline::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->headline = new Headline($node[0]),
            Description::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->description = new Description($node[0]),
            Features::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->features = new Features($node[0]),
            SoldDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->soldDetails = new SoldDetails($node[0]),
            LandDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->landDetails = new LandDetails($node[0]),
            BuildingDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->buildingDetails = new BuildingDetails($node[0]),
            InspectionTimes::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->inspectionTimes = new InspectionTimes($node[0]),
            Auction::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->auction = new Auction($node[0]),
            AuctionOutcome::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->auctionOutcome = new AuctionOutcome($node[0]),
            VendorDetails::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->vendorDetails[] = new VendorDetails($element);
                    }
                }
            },
            YearBuilt::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->yearBuilt = new YearBuilt($node[0]),
            YearLastRenovated::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->yearLastRenovated = new YearLastRenovated($node[0]),
            ExternalLink::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->externalLink[] = new ExternalLink($element);
                    }
                }
            },
            VideoLink::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->videoLink = new VideoLink($node[0]),
            ExtraFields::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->extraFields = new ExtraFields($node[0]),
            Images::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->images = new Images($node[0]),
            NewConstruction::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->newConstruction = new NewConstruction($node[0]),
            EcoFriendly::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ecoFriendly = new EcoFriendly($node[0]),
            IdealFor::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->idealFor = new IdealFor($node[0]),
            Views::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->views = new Views($node[0]),
            Objects::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->objects = new Objects($node[0]),
            Media::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->media = new Media($node[0]),
            Project::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->project = new Project($node[0]),
        ];
    }

    public function addMapping(array $array): self
    {
        $key = array_key_first($array);
        $closure = $array[$key];
        $this->mapping[$key] = $closure;

        return $this;
    }

    public function map(): self
    {
        foreach ($this->mapping as $key => $callback) {
            $callback($this->node->xpath($key));
        }

        return $this;
    }
}
