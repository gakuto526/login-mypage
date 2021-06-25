<?php
    mb_internal_encoding("utf8");

    //セッションスタート
    session_start();

    if(empty($_POST['from_mypage'])){
        header['Location:login_error.php'];
    }
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>

        <main>
            <div class="member_info">
                <h2>会員情報</h2>
                <div class="greeting">
                    こんにちは！
                    <?php echo $_SESSION['name']?>
                    さん
                </div>

                <img src="<?php echo $_SESSION['picture'];?>">

                <form action="mypage_update.php" method="post">
                    <div class="data">
                        <p>氏名:<input type="text" class="formbox" size="30" name="name" value="<?php echo $_SESSION['name'];?>"></p>
                        <p>メール:<input type="text" class="formbox" size="30" name="mail" value="<?php echo $_SESSION['mail'];?>"></p>
                        <p>パスワード:<input type="text" class="formbox" size="30" name="password" value="<?php echo$_SESSION['password'];?>"></p>
                    </div>

                    <div class="comments">
                        <textarea rows="5" cols="70" name="comments"><?php echo $_SESSION['comments'];?></textarea>
                    </div>

                    <div class="update">
                        <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                    </div>
                </form>

            </div>
        </main>

        <footer>
            © 2018 InterNous.inc.All rights reserved
        </footer>

    </body>
</html>