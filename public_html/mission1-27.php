<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission1-27</title>
</head>
<body>
   <form action="" method="post">
       <input type = "number" name = "num" placeholder="数字を入力してください">
       <input type = "submit" name = "submit">
    </form>
    <?php
        $filename = "mission1-27.txt";
        if(isset($_POST["num"])){
            $num = $_POST["num"];
            if(!empty($num)){
                $fp = fopen($filename,"a");
                fwrite($fp,$num.PHP_EOL);
                fclose($fp);
                echo "書き込み成功！<br>";
            }
        }
        if (file_exists($filename)){
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            $number_array = $lines;
            foreach($number_array as $line){
                if($line % 3 == 0 && $line % 5 == 0){
                    echo "FizzBuzz ";
                }else if($line % 3 == 0){
                    echo "Fizz ";
                }else if($line % 5 == 0){
                    echo "Buzz ";
                }else{
                    echo $line ." ";
                }
            }
        }
    ?>
</body>
</html>