<?php
use PHPUnit\Framework\TestCase;
use NumberClases\NumberConv as NumberConverter;
include 'numberconverter_way2.php';
final class NumberTest extends TestCase
{
  

    public function testCanBeUsedAsNumber()
    {
        $this->assertEquals(
            'чотири гривні',
            NumberConverter::num_to_words(4)
        );
         $this->assertEquals(
            'сорок гривень',
            NumberConverter::num_to_words(40)
        );

           $this->assertEquals(
            'сорок дві гривні',
            NumberConverter::num_to_words(42)
        );

              $this->assertEquals(
            'сімдесят вісім гривень',
            NumberConverter::num_to_words(78)
        );
                  $this->assertEquals(
            'сімдесят гривень',
            NumberConverter::num_to_words(70)
        );

        $this->assertEquals(
            'сорок п\'ять гривень',
            NumberConverter::num_to_words(45)
        );
         $this->assertEquals(
            'дев\'яносто одна гривня',
            NumberConverter::num_to_words(91)
        );
         $this->assertEquals(
            'дев\'яносто дві гривні',
            NumberConverter::num_to_words(92)
        );

 $this->assertEquals(
            'сто двадцять чотири гривні',
            NumberConverter::num_to_words(124)
        );
         $this->assertEquals(
            'вісімсот дев\'яносто гривень',
            NumberConverter::num_to_words(890)
        );

          $this->assertEquals(
            'девятсот двадцять одна гривня',
            NumberConverter::num_to_words(921)
        );

            $this->assertEquals(
            'девятсот одна гривня',
            NumberConverter::num_to_words(901)
        );
             $this->assertEquals(
            'девятсот десять гривень',
            NumberConverter::num_to_words(910)
        );

               $this->assertEquals(
            'девятсот девятнадцять гривень',
            NumberConverter::num_to_words(919)
        );


    }
}