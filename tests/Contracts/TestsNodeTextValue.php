<?php

namespace AdGroup\ReaxmlParser\Tests\Contracts;

use SimpleXMLElement;

interface TestsNodeTextValue
{
    public function getExpectedText(): string;

    public function getXmlNode(): SimpleXMLElement;

    public function getNodeClassInstance(): object;
}
