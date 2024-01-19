<?php
    $str = "Hello World";
    $filename = "mission1-25w.txt";
    $fp = fopen($filename,"w"); //wの時は上書き保存
    fwrite($fp,$str.PHP_EOL);
    fclose($fp);
    echo "書き込み成功！";
?>