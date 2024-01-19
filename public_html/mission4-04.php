<?php
    // ・データベース名：tb250595db
    // ・ユーザー名：tb-250595
    // ・パスワード：Z4VTHbzN9S
    
    //DB接続設定
    $dsn = 'mysql:dbname=tb250595db;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'tb-250595';
    $password = 'Z4VTHbzN9S';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = 'SHOW CREATE TABLE tbtest';
    $result = $pdo -> query($sql);
    foreach($result as $row){
        echo $row[1];
    }
    //echo "<hr>";
?>