<?php

namespace GerardRoche\TravisCITesting;

class DeepThoughtTest extends \PHPUnit\Framework\TestCase
{
    public function testWhatIsAnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything()
    {
        $this->assertSame(42, DeepThought::theAnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything());
    }
}
