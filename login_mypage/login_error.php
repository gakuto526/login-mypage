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
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>

        <main>
            <div class="info">
                <form action="mypage.php" method="post" enctype="multipart/form-data">

                    <div class="retry">
                        メールアドレスまたはパスワードが間違っています。
                    </div>

                    <div class="mail">
                        <p>メールアドレス</p>
                        <input type="text" class="formbox" size="40" name="mail" >
                    </div>

                    <div class="password">
                        <p>パスワード</p>
                        <input type="password" class="formbox" size="40" name="password" >
                    </div>

                    <div class="check">
                        <input type="checkbox" name="keep" value="login_keep"
                            <?php
                            if(isset($keep)){
                                echo"checked='checked'";
                            }?>>ログイン状態を保持する<br><br>
                    </div>

                    <div class="button">
                        <input type="submit" class="submit_button" size="35" value="ログイン">
                    </div>
                </form>
            </div>
        </main>

        <footer>
            <h6>© 2018 InterNous.inc.All rights reserved</h6>
        </footer>
    </body>
</html>