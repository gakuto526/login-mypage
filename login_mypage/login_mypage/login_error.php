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

                <div class="retry">
                    メールアドレスまたはパスワードが間違っています。
                </div>

                <form action="mypage.php" method="post" enctype="multipart/for
                    <p>メールアドレス</p>
                    <input type="text" class="formbox" size="40" name="mail" required>

                    <p>パスワード</p>
                    <input type="text" class="formbox" size="40" name="password" required>

                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </form>

            </div>
        </main>

        <footer>
            © 2018 InterNous.inc.All rights reserved
        </footer>
    </body>
</html>