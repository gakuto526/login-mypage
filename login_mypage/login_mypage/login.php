<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("Location:mypage.php");
    }
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <div class="info">
                <form action="mypage.php" method="post" enctype="multipart/form-data">

                    <p>メールアドレス</p>
                    <input type="text" class="formbox" size="40" name="mail" value="<?php $_COOKIE['mail'];?>">

                    <p>パスワード</p>
                    <input type="text" class="formbox" size="40" name="password" value="<?php $_COOKIE['password'];?>">

                    <input type="checkbox" name="keep" value="login_keep"
                    <?php
                        if(isset(keep=="login_keep")){
                            echo"checked='checked';
                        }>"ログイン状態を保持する"

                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </form>
            </div>
        </main>

        <footer>
            © 2018 InterNous.inc.All rights reserved
        </footer>
    </body>
</html>