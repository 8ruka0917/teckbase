<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>mission2-01</title>
</head>
<body>
   <form action="" method="post">
       <input type = "text" name = "coment" placeholder="コメント">
       <input type = "submit" name = "submit">
    </form>
    <?php
        $coment = $_POST["coment"];
        echo $coment ."を受け付けました<br>";
    ?>
</body>
</html>