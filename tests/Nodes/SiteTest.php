<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Site;
use AdGroup\ReaxmlParser\Tests\Contracts\TestsNodeTextValue;
use AdGroup\ReaxmlParser\Tests\Traits\HasNodeTextTesting;
use Orchestra\Testbench\TestCase;
use SimpleXMLElement;

class SiteTest extends TestCase implements TestsNodeTextValue
{

    use HasNodeTextTesting;

    public function getExpectedText(): string
    {
        return 'site text';
    }

    public function getXmlNode(): SimpleXMLElement
    {
        $text = $this->getExpectedText();
        $xml = simplexml_load_string("<site>" . $text . "</site>");

        return $xml;
    }

    public function getNodeClassInstance(): object
    {
        return new Site($this->getXmlNode());
    }
}
