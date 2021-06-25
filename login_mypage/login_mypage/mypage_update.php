<?php
    mb_internal_encoding("utf8");

    //セッションスタート
    session_start();

    //DB接続・try catch文
    try{
        $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root",");
    }catch(PDOException $e){
        die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
    }

    //prepared statement(update)でSQLをセットを$//bindValueメソッドでパラメータをセット
    $stmt = $pdo-> prepare("update item set name=? , mail=? password=? coments=? where id=$_SESSION['id']);

    $stmt -> bindvalue(1,$_post["name"]);
    $stmt -> bindvalue(2,$_post["mail"]);
    $stmt -> bindvalue(3,$_post["password"]);
    $stmt -> bindvalue(4,$_post["comments"]);

    //executeでクエリを実行
    $stmt -> excute();

    //prepared statement(更新された情報をDBからselect文で取得)でSQLをセットを$//bindValueメソッドでパラメータをセット
    $stmt = $pdo-> prepare("select * from login_mypage where mail=? && password=?");

    $stmt -> bindvalue(1,$_post["mail"]);
    $stmt -> bindvalue(2,$_post["password"]);

    //executeでクエリを実行
    $stmt -> excute();

    //データベースを切断
    $pdo = null;

    //fetch・while文でデータを取得し、sessionに代入
    while($row=$stmt->fetch()){
        $_SESSION['id']=$row['id'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
    }

    //mypage.phpへリダイレクト
    header('Location:mypage.php);
?>