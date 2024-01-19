<?php
    // ・データベース名：tb250595db
    // ・ユーザー名：tb-250595
    // ・パスワード：Z4VTHbzN9S
    
    //DB接続設定
    $dsn = 'mysql:dbname=tb250595db;host=localhost';  //dsnの右辺の中にスペースを入れてはいけない
    $user = 'tb-250595';
    $password = 'Z4VTHbzN9S';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    //PHPのPDO(PHP Data Objects)を使用してデータベースに接続するためのもの。
    //PDOはデータベースアクセスのための一般的なインターフェースを提供するPHP拡張モジュールで、
    //異なる種類のデータベースに対して一貫した方法でアクセスできる
?>