<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        date_default_timezone_set('UTC');
        $a=1234;
        $b=567.789;
        $c=1;
        $d=0;
        $f=true;
        $g="0";
        $h="Typy w PHP";
        $i=[1,2,3,4];
        $j=[];
        $k=["zielony","czerwony","niebieski"];
        $l=["Agata","Agatowska",4.67,true];
        $m =  date("Y-m-d"."   "."H:i");
        echo"1==true ";
        if($c==$f)
            echo"tak";
        else
            echo"nie";
        echo"<br>";
        
        if($g==$d)
            echo"tak";
        else
            echo"nie";
        
        for($w=0;$w<count($i);$w++)
            echo "$i[$w]";
        
        for($w=0;$w<count($k);$w++)
            echo "$k[$w]";
        
        for($w=0;$w<count($l);$w++)
            echo "$l[$w]";
        printf("hello world $a")
        
        ?>
    </body>
</html>
