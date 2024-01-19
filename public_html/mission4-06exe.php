<?php
    // ・データベース名：tb250595db
    // ・ユーザー名：tb-250595
    // ・パスワード：Z4VTHbzN9S
    
    //DB接続設定
    $dsn = 'mysql:dbname=tb250595db;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'tb-250595';
    $password = 'Z4VTHbzN9S';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $id = 1; //idがこの値のデータだけを抽出したい、とする
    $sql = 'SELECT * FROM tbtest WHERE id=:id';
    $stmt = $pdo->prepare($sql);   // ←差し替えるパラメータを含めて記述したSQLを準備し
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);   // ←その差し替えるパラメータの値を指定してから
    $stmt->execute();   // ←SQLを実行する。
    $results = $stmt->fetchAll();
    foreach($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    }
    echo "<hr>";
?>