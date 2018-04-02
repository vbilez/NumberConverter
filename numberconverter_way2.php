<?php
namespace NumberClases;
class NumberConv
{

    const LABELS = [
        1 => [
            '0' => '',
            '1' => 'одна',
            '2' => 'дві',
            '3' => 'три',
            '4' => 'чотири',
            '5' => 'п\'ять',
            '6' => 'шість',
            '7' => 'сім',
            '8' => 'вісім',
            '9' => 'девять',
            '10' => 'десять'],
        2 => [
            '0' => '',
            '1' => 'десять',
            '2' => 'двадцять',
            '3' => 'тридцять',
            '4' => 'сорок',
            '5' => 'п\'ятдесят',
            '6' => 'шістьдесят',
            '7' => 'сімдесят',
            '8' => 'вісімдесят',
            '9' => 'дев\'яносто'
        ],
        3 => [
            '0' => '',
            '1' => 'сто',
            '2' => 'двісті',
            '3' => 'триста',
            '4' => 'чотириста',
            '5' => 'п\'ятсот',
            '6' => 'шістсот',
            '7' => 'сімсот',
            '8' => 'вісімсот',
            '9' => 'девятсот'
        ]
    ];

    const decimal_one =
        array(
            '0' => 'десять',
            '1' => 'одинадцять',
            '2' => 'дванадцять',
            '3' => 'тринадцять',
            '4' => 'чотирнадцять',
            '5' => 'п\'ятнадцять',
            '6' => 'шістнадцять',
            '7' => 'сімнадцять',
            '8' => 'вісімнадцять',
            '9' => 'девятнадцять'
        );

    const noll = 'нуль';
    const notstring = 'введіть число, а не стрічку';
    const overflow = 'введіть число від 1 до 1000';
    const  thousand = 'тисяча';
    const fl = 'float';
    const  gryvni_vidminku =
        array(
            '1' => 'гривня',
            '2' => 'гривні',
            '3' => 'гривень',

        );
    const  sep = ' ';

    private static function gryvni($len, $n1, $n2, $n3)
    {
        if ($len == 1) {

            if ($n1 == 0) {
                return self::gryvni_vidminku[1];
           }
            if ($n1 == 1) {
                return self::gryvni_vidminku[1];
           }
            if (($n1 >= 2) && ($n1 <= 4)) {
                return self::gryvni_vidminku[2];
           }
            if (($n1 >= 5) && ($n1 <= 9)) {
                return self::gryvni_vidminku[3];
           }
        }

        if ($len == 2 || $len == 3) {


            if ($n2 == 1) {
                return self::gryvni_vidminku[3];
            }
            if ($n2 >= 2 || $n2 <= 9) {


                if ($n1 == 0) {
                    return self::gryvni_vidminku[3];
                }
                if ($n1 == 1) {
                    return self::gryvni_vidminku[1];
                }
                if (($n1 >= 2) && ($n1 <= 4)) {
                    return self::gryvni_vidminku[2];
                }
                if (($n1 >= 5) && ($n1 <= 9)) {
                    return self::gryvni_vidminku[3];
                }
            }

        }

    }

    public static function num_to_words($number)
    {
        if (!is_numeric($number)) return self::notstring;
        if ($number == 0) return self::noll;
        if (is_float($number)) return self::fl;
        if (($number < 0) || ($number > 1000)) return self::overflow;
        if ($number == 1000) return self::thousand.self::sep.self::gryvni_vidminku[3];

        $n1 = $number % 10;
        $n2 = ($number % 100 - $number % 10) / 10;
        $n3 = ($number % 1000 - $number % 100) / 100;

        $numlength = strlen((string)$number);
        $phrases = '';
        switch ($numlength) {
            case 0:
                return self::overflow;
                break;
            case 1:
                return self::LABELS[1][$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                break;
            case 2:
                if ($n2 == 1) {
                    return self::decimal_one[$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                }

                if ($n2 > 1) {
                    if ($n1 > 0)
                        return self::LABELS[2][$n2] . self::sep . self::LABELS[1][$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                    if ($n1 == 0)
                        return self::LABELS[2][$n2] . self::LABELS[1][$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                }
                break;
            case 3:
                if ($n2 > 1) {
                    if ($n1 > 0)
                        return self::LABELS[3][$n3] . self::sep . self::LABELS[2][$n2] . self::sep . self::LABELS[1][$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                     if ($n1 == 0)
                        return self::LABELS[3][$n3] . self::sep . self::LABELS[2][$n2] . self::sep . self::LABELS[1][$n1] . self::gryvni($numlength, $n1, $n2, $n3);
                    }

                if ($n2 == 1) {

                        return self::LABELS[3][$n3] . self::sep . self::decimal_one[$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);
                    }

                if ($n2 == 0) {

                        return self::LABELS[3][$n3] . self::LABELS[2][$n2] . self::sep . self::LABELS[1][$n1] . self::sep . self::gryvni($numlength, $n1, $n2, $n3);

                    }
                break;
        }


    }
}

//$nc=new NumberConv();
//echo $nc->num_to_words(124);

?>