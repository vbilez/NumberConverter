<?php

namespace NumberOps;
class NumberConverter {


    public function num_to_words($number)
{
  $texnumber=array(
    '0'=>'нуль',
    '1'=>'одна',
    '2'=>'дві',
    '3'=>'три',
    '4'=>'чотири',
    '5'=>'п\'ять',
    '6'=>'шість',
    '7'=>'сім',
    '8'=>'вісім',
    '9'=>'девять',
    '10'=>'десять',
      '11'=>'оди',
      '12'=>'два'
    );
  $decimals=array(
      '1'=>'десять ',
      '2'=>'двадцять ',
      '3'=>'тридцять ',
      '4'=>'сорок ',
      '5'=> 'п\'ятдесят ',
      '6'=> 'шістьдесят ',
      '7'=> 'сімдесят ',
      '8'=> 'вісімдесят ',
      '9'=> 'девяносто ',

    );
$gryvni=array(
     '0'=>'гривня',
     '1'=>'гривні',
     '2'=>'гривень',
);

    if(($number<=0) || ($number>1000))
    {
        return 'введіть число від 1 до 1000';
    }

    $number = (string)$number;
    $number=ltrim($number, 0);

    if($number=='0')return $texnumber[0]." ".$gryvni[2];
    if($number=='1')return $texnumber[1]." ".$gryvni[0];
    if($number=='2')return $texnumber[2]." ".$gryvni[1];
    if($number=='3')return $texnumber[3]." ".$gryvni[1];
    if($number=='4')return $texnumber[4]." ".$gryvni[1];
    if($number=='5')return $texnumber[5]." ".$gryvni[2];
    if($number=='6')return $texnumber[6]." ".$gryvni[2];
    if($number=='7')return $texnumber[7]." ".$gryvni[2];
    if($number=='8')return $texnumber[8]." ".$gryvni[2];
    if($number=='9')return $texnumber[9]." ".$gryvni[2];
    if($number=='10')return $texnumber[10]." ".$gryvni[2];
    if($number=='11')return 'одинадцять'." ".$gryvni[2];
    if($number=='12')return 'дванадцять'." ".$gryvni[2];
    if($number=='14')return 'чотирнадцять'." ".$gryvni[2];
    if($number=='15')return 'п\'ятнадцять'." ".$gryvni[2];
    if($number=='16')return 'шістнадцять'." ".$gryvni[2];
    if($number=='19')return 'девятнадцять'." ".$gryvni[2];
    if($number=='100')return 'сто'." ".$gryvni[2];
    if($number=='1000')return 'тисяча'." ".$gryvni[2];
    $str_sp=str_split($number);
    //$str=array_reverse($str_sp);
    $str=$str_sp;
    $phrases='';
    $i=1;
    foreach($str as $key=>$v)
        {

            if(($i==1)&&(count($str)==2)&&($v==1))
            {
                //$phrases.='надцять';
                $t=1;
            }
            if(($i==1)&&(count($str)==2)&&($v>1))
            {
                $phrases.=$decimals[$v];
                $t=2;
            }
            if(($i==2)&&(count($str)==2)&&($t==2)&&($v!=0))
            {
                $phrases.=$texnumber[$v];
                if($v==1)           $phrases.=" ".$gryvni[0];
                if($v>=2 && $v<=4)  $phrases.=" ".$gryvni[1];
                if($v>=5 && $v<=9)  $phrases.=" ".$gryvni[2];
            }
            if(($i==2)&&(count($str)==2)&&($t==2)&&($v==0))
            {
                $phrases.=" ".$gryvni[2];

            }
            if(($i==2)&&(count($str)==2)&&($t==1))
            {
                $phrases.=$texnumber[$v].'надцять'." ".$gryvni[2];
            }


            if(($i==1)&&(count($str)==3)&&($v==1))
            {
                $phrases.='cто ';
                $p=1;
            }

            if(($i==1)&&(count($str)==3)&&($v>1))
            {   if($v==2) $phrases.=$texnumber[2].'cта ';
                if($v>=3 && $v<=4) $phrases.=$texnumber[$v].'cта ';
                if($v>=5 && $v<=9) $phrases.=$texnumber[$v].'cот ';
                $p=1;
            }
            if(($i==2)&&(count($str)==3)&&($v>1))
            {
                $phrases.=$decimals[$v];
                $p=2;
            }

            if(($i==2)&&(count($str)==3)&&($v==1))
            {
                //$phrases.=$decimals[1];
                $p=1;
            }
            if(($i==2)&&(count($str)==3)&&($v==0))
            {
                //$phrases.='cто ';
                $p=3;
            }
            if(($i==3)&&(count($str)==3)&&($p==2))
            {
                if($v==0) $phrases.=" ".$gryvni[2];
                if($v==1) $phrases.=$texnumber[$v]." ".$gryvni[0];
                if($v>=2 && $v<=4) $phrases.=$texnumber[$v]." ".$gryvni[1];
                if($v>=5 && $v<=9) $phrases.=$texnumber[$v]." ".$gryvni[2];
            }
            if(($i==3)&&(count($str)==3)&&($p==1))
            {
                if($v==0)$phrases.=$texnumber[10]." ".$gryvni[2];
                if($v==1)$phrases.=$texnumber[11].'надцять '." ".$gryvni[2];
                if($v==2)$phrases.=$texnumber[12].'надцять '." ".$gryvni[2];
                if($v>2 && $v<=9)$phrases.=$texnumber[$v].'надцять '." ".$gryvni[2];
            }

            if(($i==3)&&(count($str)==3)&&($p==3)&($v!=0))
            {

                if($v==1) $phrases.=$texnumber[$v]." ".$gryvni[0];

                if($v>=2 && $v<=4) $phrases.=$texnumber[$v]." ".$gryvni[1];
                if($v>=5 && $v<=9) $phrases.=$texnumber[$v]." ".$gryvni[2];

            }

            if(($i==3)&&(count($str)==3)&&($p==3)&($v==0))
            {
                 $phrases.=" ".$gryvni[2];


            }



            //echo $v.'$t=='.$t.'<br>';
            $i++;
        }
    return $phrases;
}

    public  function  getTextNumber($num)
    {
            return $this->num_to_words($num);
    }
}

    //$nc= new NumberConverter();
    //$nc->getTextNumber(15);



?>