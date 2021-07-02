<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        include("con_mysql.php");
        $name = $_POST['name'];
        $id = $_POST['username'];
        $pw = $_POST['password'];
        $pw2 = $_POST['password2'];

        //判斷帳號密碼是否為空值
        //確認密碼輸入的正確性
        if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
        {
                //新增資料進資料庫語法
                $sql = "INSERT INTO login (name, username, password) VALUES ('$name','$id', '$pw')";
                if ($conn->query($sql) === TRUE) {
                        echo '<h1><big><center>新增成功!</center></big></h1>';
                        echo '<h2><center>3秒後跳轉自登入介面!</center></h2>';
                        echo '<meta http-equiv= "refresh" CONTENT = "3; url = login.html">';
                } else {
                        echo '<h1><big><center>此帳號已被註冊!</center></big></h1>';
                        echo '<meta http-equiv= "refresh" CONTENT = "3; url = register.html">';
                }
        }
        else
        {
                echo '<h1><big><center>Error</center></big></h1>';
                echo '<meta http-equiv= "refresh" CONTENT = "3; url = register.html">';
        }
?>