<?php
    $date = new DateTime('2000-01-01');
    //echo $date->format('Y-m-d');

    //$diff="+3";
    $substring="2019-12-11";

    $datetime= date($substring);
    


    $datetime2 = new DateTime("2019-12-12");
    $datetime1 = new DateTime("2019-12-10");


    $interval = $datetime2->diff($datetime1);
    $diff=$interval->format('%R%a');

    $mod_date = strtotime($datetime."$diff days");
    $dia= date("Y-m-d",$mod_date);

    echo $diff;
    echo $dia;

?>