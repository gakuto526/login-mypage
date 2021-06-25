<?php
    mb_internal_encoding("utf8");

    //セッションスタート
    session_start();

    //mypage.phpからの導線以外は、「login_error.php」へリダイレクト
    if(empty(from_mypage)){
        header(Location:login_eroor.php);
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

                    <form action="mypage_update.php" method="post" enctype="multipart/form-data">

                        <?php
                            echo "氏名：". <input type="text" class="formbox" size="40" name="name" value=$_SESSION['name']>;
                            echo "メール：". <input type="text" class="formbox" size="40" name="name" value=$_SESSION['mail']>;
                            echo "パスワード：". <input type="text" class="formbox" size="40" name="name" value=$_SESSION['password']>;
                            <p><textarea rows="5" cols="45" name="comments" value=$_SESSION['password']></textarea></p>
                        ?>

                        <input type="submit" class="submit_button" size="35" value="この内容に変更する">

                    </form>

                </div>
            </div>
        </main>

        <footer>
            © 2018 InterNous.inc.All rights reserved
        </footer>

    </body>
</html>