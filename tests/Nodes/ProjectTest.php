<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Id;
use AdGroup\ReaxmlParser\Nodes\Order;
use AdGroup\ReaxmlParser\Nodes\Project;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ProjectTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Project::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Project::class;
    }

    public function test_id_is_null_when_there_is_no_id_element(): void
    {
        $xml = $this->generateXml(Project::NODE_NAME);
        $project = new Project($xml);

        $this->assertNull($project->id);
    }

    public function test_id_is_instantiated_when_id_element_is_present(): void
    {
        $xml = $this->generateXml(Project::NODE_NAME, [], [
            [
                "name" => Id::NODE_NAME,
                "attributes" => [],
                "value" => "id-test"
            ]
        ]);
        $project = new Project($xml);

        $this->assertInstanceOf(Id::class, $project->id);
    }

    public function test_order_is_null_when_there_is_no_order_element(): void
    {
        $xml = $this->generateXml(Project::NODE_NAME);
        $project = new Project($xml);

        $this->assertNull($project->id);
    }

    public function test_order_is_instantiated_when_order_element_is_present(): void
    {
        $xml = $this->generateXml(Project::NODE_NAME, [], [
            [
                "name" => Order::NODE_NAME,
                "attributes" => [],
                "value" => "order-test"
            ]
        ]);
        $project = new Project($xml);

        $this->assertInstanceOf(Order::class, $project->order);
    }
}
