<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission1-20</title>
</head>
<body>
   <form action="" method="post">
       <input type = "number" name = "num">
       <input type = "submit" name = "">
    </form>
    <?php
        $num = $_POST["str"];
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
</body>
</html>