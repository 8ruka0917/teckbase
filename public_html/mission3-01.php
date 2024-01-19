<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission3-01</title>
</head>
<body>
   <form action="" method="post">
       <input type = "text" name = "name" placeholder="名前">
       <input type = "text" name = "coment" placeholder="コメント">
       <input type = "submit" name = "submit">
    </form>
    <?php
        
        $date = date("Y/m/d H:i:s");
        
        $filename = "mission3-1.txt";
        if(isset($_POST["coment"])){
            $name = $_POST["name"];
            $coment = $_POST["coment"];
            if(!empty($coment)){
                $fp = fopen($filename,"a");
                $count = count(file($filename, FILE_IGNORE_NEW_LINES))+1;
                fwrite($fp,"$count<>$name<>$coment<>$date".PHP_EOL);
                fclose($fp);
            
                if(file_exists($filename)){
                    $lines = file($filename, FILE_IGNORE_NEW_LINES);
                    $array = $lines;
                    foreach($array as $line){
                        echo $line ."<br>";
                    }
                }
            }
        }
        
    ?>
</body>
</html>