<?php

namespace App\ReaXml\ListingTypes;

use App\ReaXml\Contracts\MapsNodes;
use App\ReaXml\Enums\ListingStatusEnum;
use App\ReaXml\Nodes\AgentId;
use App\ReaXml\Nodes\UniqueId;
use App\ReaXml\Nodes\Authority;
use App\ReaXml\Nodes\UnderOffer;
use App\ReaXml\Nodes\IsHomeLandPackage;
use App\ReaXml\Nodes\ListingAgent;
use App\ReaXml\Nodes\Price;
use App\ReaXml\Nodes\PriceView;
use App\ReaXml\Nodes\Address;
use App\ReaXml\Nodes\Municipality;
use App\ReaXml\Nodes\StreetDirectory;
use App\ReaXml\Nodes\Category;
use App\ReaXml\Nodes\Headline;
use App\ReaXml\Nodes\Description;
use App\ReaXml\Nodes\Features;
use App\ReaXml\Nodes\SoldDetails;
use App\ReaXml\Nodes\LandDetails;
use App\ReaXml\Nodes\BuildingDetails;
use App\ReaXml\Nodes\InspectionTimes;
use App\ReaXml\Nodes\Auction;
use App\ReaXml\Nodes\AuctionOutcome;
use App\ReaXml\Nodes\VendorDetails;
use App\ReaXml\Nodes\YearBuilt;
use App\ReaXml\Nodes\YearLastRenovated;
use App\ReaXml\Nodes\ExternalLink;
use App\ReaXml\Nodes\VideoLink;
use App\ReaXml\Nodes\ExtraFields;
use App\ReaXml\Nodes\Images;
use App\ReaXml\Nodes\NewConstruction;
use App\ReaXml\Nodes\EcoFriendly;
use App\ReaXml\Nodes\IdealFor;
use App\ReaXml\Nodes\Views;
use App\ReaXml\Nodes\Objects;
use App\ReaXml\Nodes\Media;
use App\ReaXml\Nodes\Project;
use SimpleXMLElement;

class Residential
{
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

    public function __construct(SimpleXMLElement $node)
    {
        $this->mapNodes($node);

        $attributes = $node->attributes();
        $this->modTime = empty($attributes->modTime) ? null : $attributes->modTime->__toString();
        $this->status = empty($attributes->status) ? null : ListingStatusEnum::from($attributes->status->__toString());
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
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

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
