<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission1-20</title>
</head>
<body>
   <form action="" method="post">
       <input type = "number" name = "num" placeholder="数字を入力してください">
       <input type = "submit" name = "submit">
    </form>
    <?php
        $num = $_POST["num"];
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