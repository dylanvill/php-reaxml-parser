<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

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
use AdGroup\ReaxmlParser\Nodes\PayTV;
use AdGroup\ReaxmlParser\Nodes\ReverseCycleAirCon;
use AdGroup\ReaxmlParser\Nodes\RumpusRoom;
use AdGroup\ReaxmlParser\Nodes\SplitSystemAirCon;
use AdGroup\ReaxmlParser\Nodes\SplitSystemHeating;
use AdGroup\ReaxmlParser\Nodes\Study;
use AdGroup\ReaxmlParser\Nodes\Workshop;
use AdGroup\ReaxmlParser\Nodes\OtherFeatures;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class FeaturesTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Features::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Features::class;
    }

    public function test_all_properties_are_null_when_there_are_no_associated_xml_element(): void
    {
        $propertyMap = [
            'bedrooms',
            'bathrooms',
            'ensuite',
            'garages',
            'carports',
            'remoteGarage',
            'secureParking',
            'airConditioning',
            'alarmSystem',
            'vacuumSystem',
            'intercom',
            'pool',
            'poolInGround',
            'poolAboveGround',
            'spa',
            'tennisCourt',
            'balcony',
            'deck',
            'courtyard',
            'outdoorEnt',
            'shed',
            'fullyFenced',
            'openFireplace',
            'openSpaces',
            'toilets',
            'livingAreas',
            'heating',
            'hotWaterService',
            'insideSpa',
            'outsideSpa',
            'broadband',
            'builtInRobes',
            'dishwasher',
            'ductedCooling',
            'ductedHeating',
            'evaporativeCooling',
            'floorboards',
            'gasHeating',
            'gym',
            'hydronicHeating',
            'payTV',
            'reverseCycleAirCon',
            'rumpusRoom',
            'splitSystemAirCon',
            'splitSystemHeating',
            'study',
            'workshop',
            'otherFeatures'
        ];

        $xml = $this->generateXml(Features::NODE_NAME);
        $features = new Features($xml);

        foreach ($propertyMap as $key) {
            $this->assertNull($features->{$key});
        }
    }

    public function test_all_properties_contain_the_correct_instances(): void
    {
        $map = [
            Bedrooms::NODE_NAME => [
                'class' => Bedrooms::class,
                'property' => 'bedrooms'
            ],
            Bathrooms::NODE_NAME => [
                'class' => Bathrooms::class,
                'property' => 'bathrooms'
            ],
            Ensuite::NODE_NAME => [
                'class' => Ensuite::class,
                'property' => 'ensuite'
            ],
            Garages::NODE_NAME => [
                'class' => Garages::class,
                'property' => 'garages'
            ],
            Carports::NODE_NAME => [
                'class' => Carports::class,
                'property' => 'carports'
            ],
            RemoteGarage::NODE_NAME => [
                'class' => RemoteGarage::class,
                'property' => 'remoteGarage'
            ],
            SecureParking::NODE_NAME => [
                'class' => SecureParking::class,
                'property' => 'secureParking'
            ],
            AirConditioning::NODE_NAME => [
                'class' => AirConditioning::class,
                'property' => 'airConditioning'
            ],
            AlarmSystem::NODE_NAME => [
                'class' => AlarmSystem::class,
                'property' => 'alarmSystem'
            ],
            VacuumSystem::NODE_NAME => [
                'class' => VacuumSystem::class,
                'property' => 'vacuumSystem'
            ],
            Intercom::NODE_NAME => [
                'class' => Intercom::class,
                'property' => 'intercom'
            ],
            Pool::NODE_NAME => [
                'class' => Pool::class,
                'property' => 'pool'
            ],
            PoolInGround::NODE_NAME => [
                'class' => PoolInGround::class,
                'property' => 'poolInGround'
            ],
            PoolAboveGround::NODE_NAME => [
                'class' => PoolAboveGround::class,
                'property' => 'poolAboveGround'
            ],
            Spa::NODE_NAME => [
                'class' => Spa::class,
                'property' => 'spa'
            ],
            TennisCourt::NODE_NAME => [
                'class' => TennisCourt::class,
                'property' => 'tennisCourt'
            ],
            Balcony::NODE_NAME => [
                'class' => Balcony::class,
                'property' => 'balcony'
            ],
            Deck::NODE_NAME => [
                'class' => Deck::class,
                'property' => 'deck'
            ],
            Courtyard::NODE_NAME => [
                'class' => Courtyard::class,
                'property' => 'courtyard'
            ],
            OutdoorEnt::NODE_NAME => [
                'class' => OutdoorEnt::class,
                'property' => 'outdoorEnt'
            ],
            Shed::NODE_NAME => [
                'class' => Shed::class,
                'property' => 'shed'
            ],
            FullyFenced::NODE_NAME => [
                'class' => FullyFenced::class,
                'property' => 'fullyFenced'
            ],
            OpenFireplace::NODE_NAME => [
                'class' => OpenFireplace::class,
                'property' => 'openFireplace'
            ],
            OpenSpaces::NODE_NAME => [
                'class' => OpenSpaces::class,
                'property' => 'openSpaces'
            ],
            Toilets::NODE_NAME => [
                'class' => Toilets::class,
                'property' => 'toilets'
            ],
            LivingAreas::NODE_NAME => [
                'class' => LivingAreas::class,
                'property' => 'livingAreas'
            ],
            Heating::NODE_NAME => [
                'class' => Heating::class,
                'property' => 'heating'
            ],
            HotWaterService::NODE_NAME => [
                'class' => HotWaterService::class,
                'property' => 'hotWaterService'
            ],
            InsideSpa::NODE_NAME => [
                'class' => InsideSpa::class,
                'property' => 'insideSpa'
            ],
            OutsideSpa::NODE_NAME => [
                'class' => OutsideSpa::class,
                'property' => 'outsideSpa'
            ],
            Broadband::NODE_NAME => [
                'class' => Broadband::class,
                'property' => 'broadband'
            ],
            BuiltInRobes::NODE_NAME => [
                'class' => BuiltInRobes::class,
                'property' => 'builtInRobes'
            ],
            Dishwasher::NODE_NAME => [
                'class' => Dishwasher::class,
                'property' => 'dishwasher'
            ],
            DuctedCooling::NODE_NAME => [
                'class' => DuctedCooling::class,
                'property' => 'ductedCooling'
            ],
            DuctedHeating::NODE_NAME => [
                'class' => DuctedHeating::class,
                'property' => 'ductedHeating'
            ],
            EvaporativeCooling::NODE_NAME => [
                'class' => EvaporativeCooling::class,
                'property' => 'evaporativeCooling'
            ],
            Floorboards::NODE_NAME => [
                'class' => Floorboards::class,
                'property' => 'floorboards'
            ],
            GasHeating::NODE_NAME => [
                'class' => GasHeating::class,
                'property' => 'gasHeating'
            ],
            Gym::NODE_NAME => [
                'class' => Gym::class,
                'property' => 'gym'
            ],
            HydronicHeating::NODE_NAME => [
                'class' => HydronicHeating::class,
                'property' => 'hydronicHeating'
            ],
            PayTV::NODE_NAME => [
                'class' => PayTV::class,
                'property' => 'payTV'
            ],
            ReverseCycleAirCon::NODE_NAME => [
                'class' => ReverseCycleAirCon::class,
                'property' => 'reverseCycleAirCon'
            ],
            RumpusRoom::NODE_NAME => [
                'class' => RumpusRoom::class,
                'property' => 'rumpusRoom'
            ],
            SplitSystemAirCon::NODE_NAME => [
                'class' => SplitSystemAirCon::class,
                'property' => 'splitSystemAirCon'
            ],
            SplitSystemHeating::NODE_NAME => [
                'class' => SplitSystemHeating::class,
                'property' => 'splitSystemHeating'
            ],
            Study::NODE_NAME => [
                'class' => Study::class,
                'property' => 'study'
            ],
            Workshop::NODE_NAME => [
                'class' => Workshop::class,
                'property' => 'workshop'
            ],
            OtherFeatures::NODE_NAME => [
                'class' => OtherFeatures::class,
                'property' => 'otherFeatures'
            ],
        ];

        $xmlNodes = [];
        foreach ($map as $key => $value) {
            $xmlNodes[] = [
                "name" => $key,
                "value" => "sample-value",
                "attributes" => []
            ];
        }

        $xml = $this->generateXml(Features::NODE_NAME, [], $xmlNodes);
        $features = new Features($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $features->{$value["property"]});
        }
    }
}
