<?php

namespace GerardRoche\TravisCITesting;

class DeepThoughtTest extends \PHPUnit_Framework_TestCase
{
    public function testWhatIsAnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything()
    {
        $this->assertSame(42, DeepThought::theAnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything());
    }
}
