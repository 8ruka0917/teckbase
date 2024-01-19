<?php
    // ・データベース名：tb250595db
    // ・ユーザー名：tb-250595
    // ・パスワード：Z4VTHbzN9S
    
    //DB接続設定
    $dsn = 'mysql:dbname=tb250595db;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'tb-250595';
    $password = 'Z4VTHbzN9S';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $name = 'hrk2';
    $comment = 'Hello World2';
    
    $sql = "INSERT INTO tbtest (name, comment) VALUES (:name, :comment)";
    //$sql = "INSERT INTO tbtest (name, comment) VALUES ('2', :name, :comment)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR); //$stmt と呼ばれる PDO ステートメントにおいて、プレースホルダ :nameに変数$nameの値をバインド
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();
    //bindParamの引数名(:name など)はテーブルのカラム名に併せるとミスが少なくなります。最適なものを適宜決めよう。
?>