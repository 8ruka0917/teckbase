<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>Mission 3-03</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前">
        <input type="text" name="comment" placeholder="コメント">
        <input type="submit" name="submit" value="投稿">
        <br>
        <input type="text" name="deleteNumber" placeholder="削除対象番号">
        <input type="submit" name="delete" value="削除">
    </form>

    <?php
        // 新規投稿
        if (!empty($_POST["name"]) && !empty($_POST["comment"])) {
            $name = $_POST["name"];
            $comment = $_POST["comment"];
            
            $date = date("Y/m/d H:i:s");
            $filename = "mission3-3.txt";
       
            if (file_exists($filename)) {
                $lines = file($filename, FILE_IGNORE_NEW_LINES);
                $lastline = array_slice($lines, -1);  //array_slice関数で最後の要素を取得した配列を作成（このとき$lastlineは配列）
                $num = explode("<>", implode($lastline));  //$lastlineを文字列として処理するためにimplode関数で結合
                $count = $num[0] + 1;
            }else{
                $count = 1;
            }

            $fp = fopen($filename, "a");
            fwrite($fp, $count ."<>" .$name ."<>" .$comment ."<>" .$date.PHP_EOL);
            fclose($fp);
        
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
        
            foreach($lines as $line){
                $content = explode("<>", $line);
                echo $line ."<br>";
                // echo $content[0] ."<br>";
                // echo $content[1] ."<br>";
                // echo $content[2] ."<br>";
                // echo $content[3] ."<br>";
            }
        }else if(!empty($_POST["deleteNumber"])){
            //削除対象番号を送信
            $deleteNumber = $_POST["deleteNumber"];
        
            $filename = "mission3-3.txt";
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
        
            $fp = fopen($filename, "w");
            
            foreach ($lines as $line) {
                $content = explode("<>", $line);
                if(!($content[0] == $deleteNumber)) {
                    fwrite($fp, $line.PHP_EOL);
                    echo $line ."<br>";
                } 
            }
            fclose($fp);
        }
    ?>
</body>
</html>
