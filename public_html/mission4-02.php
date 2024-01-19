<?php
    // ・データベース名：tb250595db
    // ・ユーザー名：tb-250595
    // ・パスワード：Z4VTHbzN9S
    
    //DB接続設定
    $dsn = 'mysql:dbname=tb250595db;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'tb-250595';
    $password = 'Z4VTHbzN9S';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = "CREATE TABLE IF NOT EXISTS tbtest"  // IF NOT EXISTS tbtest:もしまだこのテーブルが存在しないなら
    ." ("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"  //id:自動で登録されているナンバリング
    ."name CHAR(32),"  //name:名前を入れる。文字列、半角英数で32文字
    ."comment TEXT" //comment:コメントを入れる。文字列、長めの文章も入る
    .");";
    $stmt = $pdo->query($sql);  //SQL文を実行し、その結果を PDOStatement オブジェクトとして取得している。
    //$pdo に対して query メソッドを呼び出している。
    //query メソッドは、データベースへの問い合わせを行い、結果を PDOStatement オブジェクトとして返す。
    //このオブジェクトは、取得したデータにアクセスするための様々なメソッドやプロパティを提供します。
?>