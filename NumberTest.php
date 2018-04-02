<?php
use PHPUnit\Framework\TestCase;
use NumberOps\NumberConverter as NumberConverter;
include 'numberconverter.php';
final class NumberTest extends TestCase
{
  

    public function testCanBeUsedAsNumber()
    {
        $this->assertEquals(
            'чотири гривні',
            NumberConverter::num_to_words(4)
        );

        $this->assertEquals(
            'сорок п\'ять гривень',
            NumberConverter::num_to_words(45)
        );
         $this->assertEquals(
            'девяносто одна гривня',
            NumberConverter::num_to_words(91)
        );
         $this->assertEquals(
            'девяносто дві гривні',
            NumberConverter::num_to_words(92)
        );


         $this->assertEquals(
            'вісімсот вісімдесят гривень',
            NumberConverter::num_to_words(880)
        );

          $this->assertEquals(
            'девятьсот двадцять одна гривня',
            NumberConverter::num_to_words(921)
        );
    }
}