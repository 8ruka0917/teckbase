<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission2-02</title>
</head>
<body>
   <form action="" method="post">
       <input type = "text" name = "coment" placeholder="コメント">
       <input type = "submit" name = "submit">
    </form>
    <?php
        $filename = "mission2-2.txt";
        if(isset($_POST["coment"])){
            $coment = $_POST["coment"];
            if(!empty($coment)){
                $fp = fopen($filename,"w");
                fwrite($fp,$coment.PHP_EOL);
                fclose($fp);
                // echo $coment ."を受け付けました<br>";
            
                if(file_exists($filename)){
                    $lines = file($filename, FILE_IGNORE_NEW_LINES);
                    $coment_array = $lines;
                    foreach($coment_array as $line){
                        if($line == "完成！"){
                            echo "おめでとう！<br>";
                        }else{
                            echo $line ."<br>";
                        }
                    }    
                }
            }
        }
        
    ?>
</body>
</html>