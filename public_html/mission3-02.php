<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission3-02</title>
</head>
<body>
   <form action="" method="post">
       <input type = "text" name = "name" placeholder="名前">
       <input type = "text" name = "coment" placeholder="コメント">
       <input type = "submit" name = "submit">
    </form>
    <?php
        $date = date("Y/m/d H:i:s");
        $filename = "mission3-2.txt";
        if(isset($_POST["coment"])){
            $name = $_POST["name"];
            $coment = $_POST["coment"];
            if(!empty($_POST["name"]) && !empty($coment)){
                $fp = fopen($filename,"a");
                $count = count(file($filename, FILE_IGNORE_NEW_LINES)) + 1;
                fwrite($fp,"$count<>$name<>$coment<>$date".PHP_EOL);
                fclose($fp);
            }
        }
        if(file_exists($filename)){
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $content = explode("<>", $line);
                echo $content[0] ."<br>";
                echo $content[1] ."<br>";
                echo $content[2] ."<br>";
                echo $content[3] ."<br>";
            }
        }
    ?>
</body>
</html>