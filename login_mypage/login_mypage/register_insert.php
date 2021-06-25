<?php
    mb_internal_encoding("utf8");

    //DB接続
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

    //prepared statementでSQL文の型を作る
    $stmt = $pdo-> prepare("insert into login_mypage(name,mail,password,picture,comments)
    values(?????)");

    //bindValueメソッドでパラメータをセット
    $stmt -> bindvalue(1,$_post["name"]);
    $stmt -> bindvalue(2,$_post["mail"]);
    $stmt -> bindvalue(3,$_post["password"]);
    $stmt -> bindvalue(4,$_post["path_filename"]);
    $stmt -> bindvalue(5,$_post["comments"]);

    //excuteでクエリを実行
    $stmt -> excute();
    $pdo = Null;
    header('Location:after_register.html);
?>