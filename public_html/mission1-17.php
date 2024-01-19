<?php
    $num = 4;
    if($num % 3 == 0 && $num % 5 == 0){
        echo"FizzBuzz";
    }else if($num % 3 == 0){
        echo "Fizz";
    }else if($num % 5 == 0){
        echo"Buzz";
    }else{
        echo $num;
    }
?>