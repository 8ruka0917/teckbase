<?php
    $member = array("Ken","Alice","Judy","BOSS","Bob");
    foreach($member as $name){
        if($name == "BOSS"){
            echo"Good morning ".$name."!<br>";
        }else{
            echo"Hi! ".$name."<br>";
        }
    }
?>