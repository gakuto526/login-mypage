<?php
    mb_internal_encoding("utf8");
    session_start();

    if(empty($_SESSION['id'])){

        try{
            //try catch文。DBに接続できなければエラーメッセージを表示
            $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root",");
        }catch(PDOException $e){
            die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
            <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
        }
        
        //prepared statementでSQL文の型を作る(DBとpostデータを照合させる。select文とwhere句を使用。)
        $stmt = $pdo-> prepare("select * from login_mypage where mail=? && password=?");

        //bindValueメソッドでパラメータをセット
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

        //データが取得出来ずに(emptyを使用して判定)sessionがなければ、リダイレクト(エラー画面へ)
        if(empty($_SESSION['id'])){
            header('Location:login_error.php);
        }

        if(!empty($_POST['keep'])){
            $_SESSION['keep']=$_POST['keep'];
        }

        if(!empty($_SESSION['id']) && !empty($_SESSION['keep'])){
            setcookie('mail,$_SESSION['mail'],time()+60*60*24*7);
            setcookie('password,$_SESSION['password'],time()+60*60*24*7);
            setcookie('keep,$_SESSION['keep'],time()+60*60*24*7);
        }else if(empty($_SESSION['keep'])){
            setcookie('mail','',time()-1);
            setcookie('password','',time()-1);
            setcookie('keep','',time()-1);
        }
    }
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <div class="member_info">
                <p>会員情報</p>
                <div class="greeting">
                    <?php
                        echo "こんにちは！". $_SESSION['name']. "さん";
                    ?>

                    <img src="<?php echo $_SESSION['picture'];?>">

                    <?php
                        echo "氏名：". $_SESSION['name'];
                        echo "メール：". $_SESSION['mail'];
                        echo "パスワード：". $_SESSION['password'];
                    ?>

                    <div class="comments">
                        <?php echo $_SESSION['comments'];?>
                    </div>

                    <form action="mypage_hensyu.php" method="post" class="form_center">
                        <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                        <div class="hensyubutton">
                            <input type="submit" class="submit_button" size="35" value="編集する">
                        </div>
                    </form>

                </div>
            </div>
        </main>

        <footer>
            © 2018 InterNous.inc.All rights reserved
        </footer>

    </body>
</html>