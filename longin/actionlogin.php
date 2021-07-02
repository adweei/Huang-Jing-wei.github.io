<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    //連接資料庫
    //只要此頁面上有用到連接MySQL就要include它
    include("con_mysql.php");
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];
    $incode = $_POST['inputcode'];
    $comcode = $_POST['complex'];   
    //搜尋資料庫資料
    $sql = "SELECT * FROM login where username = '$username'";
    $result = $conn->query($sql);
    $row = @mysqli_fetch_row($result);

    //判斷帳號與密碼是否為空白
    //以及MySQL資料庫裡是否有這個會員
    if($username != null && $password != null && $row[1] == $username && $row[2] == $password)
    {
        if($incode != $comcode)
        {
            echo '<h1><big><center>驗證碼錯誤!</center></big></h2>';
            echo '<meta http-equiv=REFRESH CONTENT = "3; url=login.html">'; 
        }
        else{
            //將帳號寫入session，方便驗證使用者身份
            $_SESSION['username'] = $username;
            echo '<h1><big><center>登入成功!</center></big></h2>';
            echo '<meta http-equiv=REFRESH CONTENT = "3;url = https://www.google.com.tw/">';            
        }
    }
    else
    {
        echo '<h1><big><center>登入失敗!</center></big></h2>';
        echo '<meta http-equiv=REFRESH CONTENT = "3; url=login.html">';
    }
?>