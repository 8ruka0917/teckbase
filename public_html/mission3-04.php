
<?php
    $filename = "mission3-4.txt";
    $date = date("Y/m/d H:i:s");

    // 新規投稿
    if (!empty($_POST["name"]) && !empty($_POST["comment"])) {
        $name = $_POST["name"];
        $comment = $_POST["comment"];
            
        if (file_exists($filename)) {
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            $lastline = array_slice($lines, -1);  //array_slice関数で最後の要素を取得した配列を作成（このとき$lastlineは配列）
            $num = explode("<>", implode($lastline));  //$lastlineを文字列として処理するためにimplode関数で結合
            $count = $num[0] + 1;
        }else{
            $count = 1;
        }
        
        if(!empty($_POST["form"])){ //空ではなかったら
            $fp = fopen($filename, "w");
            foreach ($lines as $line) {
                $content = explode("<>", $line);
                if($content[0] == $_POST["form"]){
                    $name = $_POST["name"];
                    $comment = $_POST["comment"];
                    fwrite($fp, $_POST["form"] ."<>" .$name ."<>" .$comment ."<>" .$date.PHP_EOL);  
                }else{
                    fwrite($fp, $line.PHP_EOL);
                }
            }
            fclose($fp);
        }else{ //空だったら
            $fp = fopen($filename, "a");
            fwrite($fp, $count ."<>" .$name ."<>" .$comment ."<>" .$date.PHP_EOL);
            fclose($fp);
        } 
    }else if(!empty($_POST["deleteNumber"])){
        //削除対象番号を送信
        $deleteNumber = $_POST["deleteNumber"];
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $fp = fopen($filename, "w");
            
        foreach ($lines as $line) {
            $content = explode("<>", $line);
            if(!($content[0] == $deleteNumber)) {
                fwrite($fp, $line.PHP_EOL);
            } 
        }
        fclose($fp);
    }else if(!empty($_POST["editNumber"])){
        $editNumber = $_POST["editNumber"];
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
            
        foreach ($lines as $line) {
            $content = explode("<>", $line);
            if($content[0] == $editNumber){
                //その投稿の「名前」と「コメント」を取得
                $inputName = $content[1];
                $inputComment = $content[2];
            }
        }        
    }
    ?>
    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>Mission 3-04</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" value="<?php echo $inputName ?? ""; ?>" placeholder="名前">
        <input type="text" name="comment" value="<?php echo $inputComment ?? ""; ?>" placeholder="コメント">
        <input type="hidden" name="form" value="<?php echo $editNumber ?? ""; ?>">
        <input type="submit" name="submit" value="投稿">
        <br>
        <input type="text" name="deleteNumber" placeholder="削除対象番号">
        <input type="submit" name="delete" value="削除">
        <br>
        <input type="text" name="editNumber" placeholder="編集番号">
        <input type="submit" name="edit" value="編集">
    </form>
    
    <?php
        $filename = "mission3-4.txt";
        $date = date("Y/m/d H:i:s");
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        
        foreach ($lines as $line) {
            echo $line ."<br>";
        }
    ?>
</body>
</html>
