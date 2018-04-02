<?php

require 'numberconverter.php';
use NumberOps\NumberConverter as Nc;
$nc=new Nc();
if(isset($_POST) && !empty($_POST['fieldvalue'])) {

    //$obj=json_decode($_POST['fieldvalue'],true);

    //$fieldvalue=$obj->fieldvalue;
    $fieldvalue=$_POST['fieldvalue'];
    if(is_numeric($fieldvalue))
    {
        $fieldvalue=$nc->getTextNumber($fieldvalue);
        $result=array(
            'result'=>$fieldvalue
        );
        echo json_encode($result);
    }
    else {
        $fieldvalue='Введіть число а не стрічку';
        $result=array(
            'result'=>$fieldvalue
        );
        echo json_encode($result);
    }


}
else {
    $fieldvalue='Введіть число більше нуля';
    $result=array(
        'result'=>$fieldvalue
    );
    echo json_encode($result);
}


?>