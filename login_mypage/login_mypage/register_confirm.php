<?php
mb_internal_encoding("utf8");

//仮保存されたファイルで画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名)
$temp_pic_name=$_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要あり
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>

    <body>
        
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <div class="complete">
                <div class title>会員登録　確認</div>
                <div class check>
                    <p>こちらの内容で登録しても宜しいでしょうか？</p>

                    <?php
                        echo "<br><br>"
                        echo "氏名:" . $_POST['name'];
                        echo "<br><br>"
                        echo "メール:" . $_POST['mail'];
                        echo "<br><br>"
                        echo "パスワード:" . $_POST['password'];
                        echo "<br><br>"
                        echo "プロフィール写真:" . $original_pic_name;
                        echo "<br><br>"
                        echo "コメント:" . $_POST['comments'];
                    ?>

                    <form action="insert.php" method="post">
                        <input type="submit" class="button2" value="登録する"/>
                        <input type="hidden" value="<?php echo $_POST['name'];?>"name="name">
                        <input type="hidden" value="<?php echo $_POST['mail'];?>"name="mail">
                        <input type="hidden" value="<?php echo $_POST['password'];?>"name="password">
                        <input type="hidden" value="<?php echo "./image/".$original_pic_name;?>"name="path_filename">
                        <input type="hidden" value="<?php echo $_POST['comments'];?>"name="comments">
                    </form>

                    <form action="register.php">
                        <input type="submit" class="button1" value="戻って修正する"/>
                    </form>

                </div>
            </div>
        </main>

    </body>

</html>