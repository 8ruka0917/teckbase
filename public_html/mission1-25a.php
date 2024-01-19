<?php
    $str = "Hello World";
    $filename = "mission1-25a.txt";
    $fp = fopen($filename,"a"); //aの時はファイルに追加で記録できる
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo "書き込み成功！";
?>