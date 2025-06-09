<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Bedrooms;
use AdGroup\ReaxmlParser\Nodes\Bathrooms;
use AdGroup\ReaxmlParser\Nodes\Ensuite;
use AdGroup\ReaxmlParser\Nodes\Garages;
use AdGroup\ReaxmlParser\Nodes\Carports;
use AdGroup\ReaxmlParser\Nodes\RemoteGarage;
use AdGroup\ReaxmlParser\Nodes\SecureParking;
use AdGroup\ReaxmlParser\Nodes\AirConditioning;
use AdGroup\ReaxmlParser\Nodes\AlarmSystem;
use AdGroup\ReaxmlParser\Nodes\VacuumSystem;
use AdGroup\ReaxmlParser\Nodes\Intercom;
use AdGroup\ReaxmlParser\Nodes\Pool;
use AdGroup\ReaxmlParser\Nodes\PoolInGround;
use AdGroup\ReaxmlParser\Nodes\PoolAboveGround;
use AdGroup\ReaxmlParser\Nodes\Spa;
use AdGroup\ReaxmlParser\Nodes\TennisCourt;
use AdGroup\ReaxmlParser\Nodes\Balcony;
use AdGroup\ReaxmlParser\Nodes\Deck;
use AdGroup\ReaxmlParser\Nodes\Courtyard;
use AdGroup\ReaxmlParser\Nodes\OutdoorEnt;
use AdGroup\ReaxmlParser\Nodes\Shed;
use AdGroup\ReaxmlParser\Nodes\FullyFenced;
use AdGroup\ReaxmlParser\Nodes\OpenFireplace;
use AdGroup\ReaxmlParser\Nodes\OpenSpaces;
use AdGroup\ReaxmlParser\Nodes\Toilets;
use AdGroup\ReaxmlParser\Nodes\LivingAreas;
use AdGroup\ReaxmlParser\Nodes\Heating;
use AdGroup\ReaxmlParser\Nodes\HotWaterService;
use AdGroup\ReaxmlParser\Nodes\InsideSpa;
use AdGroup\ReaxmlParser\Nodes\OutsideSpa;
use AdGroup\ReaxmlParser\Nodes\Broadband;
use AdGroup\ReaxmlParser\Nodes\BuiltInRobes;
use AdGroup\ReaxmlParser\Nodes\Dishwasher;
use AdGroup\ReaxmlParser\Nodes\DuctedCooling;
use AdGroup\ReaxmlParser\Nodes\DuctedHeating;
use AdGroup\ReaxmlParser\Nodes\EvaporativeCooling;
use AdGroup\ReaxmlParser\Nodes\Floorboards;
use AdGroup\ReaxmlParser\Nodes\GasHeating;
use AdGroup\ReaxmlParser\Nodes\Gym;
use AdGroup\ReaxmlParser\Nodes\HydronicHeating;
use AdGroup\ReaxmlParser\Nodes\PayTv;
use AdGroup\ReaxmlParser\Nodes\ReverseCycleAirCon;
use AdGroup\ReaxmlParser\Nodes\RumpusRoom;
use AdGroup\ReaxmlParser\Nodes\SplitSystemAirCon;
use AdGroup\ReaxmlParser\Nodes\SplitSystemHeating;
use AdGroup\ReaxmlParser\Nodes\Study;
use AdGroup\ReaxmlParser\Nodes\Workshop;
use AdGroup\ReaxmlParser\Nodes\OtherFeatures;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Features
{
    const NODE_NAME = "features";

    use HasNodeValidation;

    public ?Bedrooms $bedrooms = null;
    public ?Bathrooms $bathrooms = null;
    public ?Ensuite $ensuite = null;
    public ?Garages $garages = null;
    public ?Carports $carports = null;
    public ?RemoteGarage $remoteGarage = null;
    public ?SecureParking $secureParking = null;
    public ?AirConditioning $airConditioning = null;
    public ?AlarmSystem $alarmSystem = null;
    public ?VacuumSystem $vacuumSystem = null;
    public ?Intercom $intercom = null;
    public ?Pool $pool = null;
    public ?PoolInGround $poolInGround = null;
    public ?PoolAboveGround $poolAboveGround = null;
    public ?Spa $spa = null;
    public ?TennisCourt $tennisCourt = null;
    public ?Balcony $balcony = null;
    public ?Deck $deck = null;
    public ?Courtyard $courtyard = null;
    public ?OutdoorEnt $outdoorEnt = null;
    public ?Shed $shed = null;
    public ?FullyFenced $fullyFenced = null;
    public ?OpenFireplace $openFireplace = null;
    public ?OpenSpaces $openSpaces = null;
    public ?Toilets $toilets = null;
    public ?LivingAreas $livingAreas = null;
    public ?Heating $heating = null;
    public ?HotWaterService $hotWaterService = null;
    public ?InsideSpa $insideSpa = null;
    public ?OutsideSpa $outsideSpa = null;
    public ?Broadband $broadband = null;
    public ?BuiltInRobes $builtInRobes = null;
    public ?Dishwasher $dishwasher = null;
    public ?DuctedCooling $ductedCooling = null;
    public ?DuctedHeating $ductedHeating = null;
    public ?EvaporativeCooling $evaporativeCooling = null;
    public ?Floorboards $floorboards = null;
    public ?GasHeating $gasHeating = null;
    public ?Gym $gym = null;
    public ?HydronicHeating $hydronicHeating = null;
    public ?PayTV $payTV = null;
    public ?ReverseCycleAirCon $reverseCycleAirCon = null;
    public ?RumpusRoom $rumpusRoom = null;
    public ?SplitSystemAirCon $splitSystemAirCon = null;
    public ?SplitSystemHeating $splitSystemHeating = null;
    public ?Study $study = null;
    public ?Workshop $workshop = null;
    public ?OtherFeatures $otherFeatures = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Bedrooms::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->bedrooms = new Bedrooms($node[0]),
            Bathrooms::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->bathrooms = new Bathrooms($node[0]),
            Ensuite::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ensuite = new Ensuite($node[0]),
            Garages::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->garages = new Garages($node[0]),
            Carports::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->carports = new Carports($node[0]),
            RemoteGarage::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->remoteGarage = new RemoteGarage($node[0]),
            SecureParking::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->secureParking = new SecureParking($node[0]),
            AirConditioning::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->airConditioning = new AirConditioning($node[0]),
            AlarmSystem::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->alarmSystem = new AlarmSystem($node[0]),
            VacuumSystem::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->vacuumSystem = new VacuumSystem($node[0]),
            Intercom::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->intercom = new Intercom($node[0]),
            Pool::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->pool = new Pool($node[0]),
            PoolInGround::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->poolInGround = new PoolInGround($node[0]),
            PoolAboveGround::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->poolAboveGround = new PoolAboveGround($node[0]),
            Spa::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->spa = new Spa($node[0]),
            TennisCourt::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->tennisCourt = new TennisCourt($node[0]),
            Balcony::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->balcony = new Balcony($node[0]),
            Deck::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->deck = new Deck($node[0]),
            Courtyard::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->courtyard = new Courtyard($node[0]),
            OutdoorEnt::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->outdoorEnt = new OutdoorEnt($node[0]),
            Shed::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->shed = new Shed($node[0]),
            FullyFenced::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->fullyFenced = new FullyFenced($node[0]),
            OpenFireplace::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->openFireplace = new OpenFireplace($node[0]),
            OpenSpaces::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->openSpaces = new OpenSpaces($node[0]),
            Toilets::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->toilets = new Toilets($node[0]),
            LivingAreas::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->livingAreas = new LivingAreas($node[0]),
            Heating::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->heating = new Heating($node[0]),
            HotWaterService::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->hotWaterService = new HotWaterService($node[0]),
            InsideSpa::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->insideSpa = new InsideSpa($node[0]),
            OutsideSpa::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->outsideSpa = new OutsideSpa($node[0]),
            Broadband::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->broadband = new Broadband($node[0]),
            BuiltInRobes::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->builtInRobes = new BuiltInRobes($node[0]),
            Dishwasher::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->dishwasher = new Dishwasher($node[0]),
            DuctedCooling::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ductedCooling = new DuctedCooling($node[0]),
            DuctedHeating::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->ductedHeating = new DuctedHeating($node[0]),
            EvaporativeCooling::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->evaporativeCooling = new EvaporativeCooling($node[0]),
            Floorboards::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->floorboards = new Floorboards($node[0]),
            GasHeating::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->gasHeating = new GasHeating($node[0]),
            Gym::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->gym = new Gym($node[0]),
            HydronicHeating::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->hydronicHeating = new HydronicHeating($node[0]),
            PayTv::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->payTV = new PayTv($node[0]),
            ReverseCycleAirCon::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->reverseCycleAirCon = new ReverseCycleAirCon($node[0]),
            RumpusRoom::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->rumpusRoom = new RumpusRoom($node[0]),
            SplitSystemAirCon::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->splitSystemAirCon = new SplitSystemAirCon($node[0]),
            SplitSystemHeating::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->splitSystemHeating = new SplitSystemHeating($node[0]),
            Study::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->study = new Study($node[0]),
            Workshop::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->workshop = new Workshop($node[0]),
            OtherFeatures::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->otherFeatures = new OtherFeatures($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
