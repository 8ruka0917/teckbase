<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>Mission 3-05</title>
</head>
<body>
    <font size="6">投稿・削除・編集機能がある掲示板</font>
    <br>
    <br>
    <font size="4">投稿時決めたパスワードが一致しないと削除・編集が行えない。</font>
    <br>
    <font size="4">パスワードは画面に表示されないが、テキストファイル内に保存されている。</font>
    <br>
    <br>
</body>
</html>

<?php
    $filename = "mission3-5.txt";
    $date = date("Y/m/d H:i:s");

        // 新規投稿
        if (!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["submitPW"])) {
            $name = $_POST["name"];
            $comment = $_POST["comment"];
            $submitPW = $_POST["submitPW"]; 
            $editPW = $_POST["editPW"];
            
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
                //$lines = file($filename, FILE_IGNORE_NEW_LINES);
                    
                foreach ($lines as $line) {
                    $content = explode("<>", $line);
                    if($content[0] == $_POST["form"]){
                        $name = $_POST["name"];
                        $comment = $_POST["comment"];
                        $submitPW = $_POST["submitPW"]; 
                        fwrite($fp, $_POST["form"] ."<>" .$name ."<>" .$comment ."<>" .$date ."<>" .$submitPW .PHP_EOL);  
                    }else{
                        fwrite($fp, $line.PHP_EOL);
                    }
                }
                fclose($fp);
            }else{ //空だったら
                $fp = fopen($filename, "a");
                fwrite($fp, $count ."<>" .$name ."<>" .$comment ."<>" .$date ."<>" .$submitPW .PHP_EOL);
                fclose($fp);
            } 
        }else if(!empty($_POST["deleteNumber"])){ //削除機能
            $deletePW = $_POST["deletePW"]; 
            $deleteNumber = $_POST["deleteNumber"];
           
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            
            foreach ($lines as $line) {
                $content = explode("<>", $line);
                if($content[0] == $deleteNumber){
                   if (!($deletePW == $content[4])) {
                        echo "パスワードが違います";
                        fwrite($fp, $line.PHP_EOL);
                    }
                }else{
                    fwrite($fp, $line.PHP_EOL);
                } 
            } 
            fclose($fp);
        }else if(!empty($_POST["editNumber"])){
            $editNumber = $_POST["editNumber"];
            $editPW = $_POST["editPW"];
            
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            
            foreach ($lines as $line) {
                $content = explode("<>", $line);
                if($content[0] == $editNumber){
                    if($editPW == $content[4]){
                        //その投稿の「名前」と「コメント」を取得
                        $inputName = $content[1];
                        $inputComment = $content[2];
                    }else{
                        echo "パスワードが違います";
                        //fwrite($fp, $line .PHP_EOL);
                    }
                // }else{
                //     fwrite($fp, $line .PHP_EOL);
                 }
            }
        }
    ?>
    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>Mission 3-05</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前" value="<?php echo $inputName ?? ""; ?>" >
        <input type="text" name="comment" value="<?php echo $inputComment ?? ""; ?>" placeholder="コメント">
        <input type="hidden" name="form" value="<?php echo $editNumber ?? ""; ?>" >
        <input type="text" name="submitPW" placeholder="パスワード">
        <input type="submit" name="submit" value="投稿">
        <br>
        <input type="text" name="deleteNumber" placeholder="削除対象番号">
        <input type="text" name="deletePW" placeholder="投稿時に決めたパスワード">
        <input type="submit" name="delete" value="削除">
        <br>
        <input type="text" name="editNumber" placeholder="編集番号">
        <input type="text" name="editPW" placeholder="投稿時に決めたパスワード">
        <input type="submit" name="edit" value="編集">
    </form>
    
    <?php
        $filename = "mission3-5.txt";
        $date = date("Y/m/d H:i:s");
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        
        foreach ($lines as $line) {
            $content = explode("<>", $line);
            echo $content[0] ." ";
            echo $content[1] ." ";
            echo $content[2] ." ";
            echo $content[3] ."<br>";
        }
    ?>
</body>
</html>
