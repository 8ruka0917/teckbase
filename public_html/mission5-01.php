<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>Mission 5-01</title>
</head>
<body>
    <font size="6">投稿・削除・編集機能がある掲示板</font>
    <br>
    <br>
    <font size="4">投稿時決めたパスワードが一致しないと削除・編集が行えない。編集時はパスワードも変更可能！</font>
    <br>
    <font size="4">パスワードは画面に表示されないが、テキストファイル内に保存されている。</font>
    <br>
    <br>
</body>
</html>

<?php
    //DB接続設定
    $dsn = 'mysql:dbname=データベース名;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = "CREATE TABLE IF NOT EXISTS content"  // IF NOT EXISTS tbtest:もしまだこのテーブルが存在しないなら
    ." ("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"  //id:自動で登録されているナンバリング。　id=count
    ."name CHAR(32),"  //name:名前を入れる。文字列、半角英数で32文字
    ."comment TEXT," //comment:コメントを入れる。文字列、長めの文章も入る
    ."date DATETIME,"
    ."pw TEXT"
    .");";
    $stmt = $pdo->query($sql);  //query メソッドは、データを取得する SELECT ステートメントを実行するために使用される
    
    if (!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["submitPW"])) {
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $submitPW = $_POST["submitPW"]; 
        $date =  date("Y/m/d H:i:s");
            
        if(!empty($_POST["form"])){ //編集k機能
            $editNumber = $_POST["form"];
            
            $stmt = $pdo->prepare("UPDATE content SET name=:name, comment=:comment, date=:date, pw=:submitPW WHERE id=:id"); 
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':submitPW', $submitPW, PDO::PARAM_STR);   //パスワードも編集
            $stmt->bindParam(':id', $editNumber, PDO::PARAM_INT);
            $stmt->execute();
        }else{   //新規投稿
            $stmt = $pdo->prepare("INSERT INTO content (name, comment, date, pw) VALUES (:name, :comment, :date, :submitPW)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':submitPW', $submitPW, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->execute();
        }
    }else if(!empty($_POST["deleteNumber"])){ //削除機能
        $deletePW = $_POST["deletePW"]; 
        $deleteNumber = $_POST["deleteNumber"];
           
        $stmt = $pdo->prepare("SELECT * FROM content WHERE id=:id AND pw=:submitPW");
        $stmt->bindParam(':id', $deleteNumber, PDO::PARAM_INT);
        $stmt->bindParam(':submitPW', $deletePW, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if($result){
            $stmt = $pdo->prepare("DELETE FROM content WHERE id=:id");
            $stmt->bindParam(':id', $deleteNumber, PDO::PARAM_INT);
            $stmt->execute();
        }else{
            echo "パスワードが違います";
        }  
    }else if(!empty($_POST["editNumber"])){
        $editNumber = $_POST["editNumber"];
        $editPW = $_POST["editPW"];
        
        $stmt = $pdo->prepare("SELECT * FROM content WHERE id=:id AND pw=:submitPW");
        $stmt->bindParam(':id', $editNumber, PDO::PARAM_INT);
        $stmt->bindParam(':submitPW', $editPW, PDO::PARAM_STR);
        $stmt->execute();   //準備されたステートメントを実行するためのメソッド。このメソッドを呼び出すことで、プリペアドステートメント内の SQL クエリが実際にデータベースに対して実行される。
        $result = $stmt->fetch();   //実行されたクエリから1行分の結果を取得するためのメソッド
            
        if($result){
            $inputName = $result['name'];
            $inputComment = $result['comment'];
        }else{
            echo "パスワードが違います";
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
        $stmt = $pdo->query("SELECT * FROM content");
        $results = $stmt->fetchAll();
        
        foreach ($results as $row) {
            echo $row['id'] ." ";
            echo $row['name'] ." ";
            echo $row['comment'] ." ";
            //echo $row['pw']." ";
            echo $row['date'] ."<br>";
        }
    ?>
</body>
</html>
