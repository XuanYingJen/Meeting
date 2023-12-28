<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <title>高雄大學資訊工程系會議管理系統</title>
        <link rel="stylesheet" href="上方工具列及標題.css"/>
    </head>
    <body>
    <?php session_start();
        $account = $_SESSION['account'];?>
        <header class="home">
            <img src="CSIE.jpg" width="50" height="50" style="float: left;">
            <h1><a href="首頁2.php">&nbsp高雄大學資訊工程系會議管理系統</a><?php for($i=0;$i<90;$i++){echo "&nbsp;";}echo $account?> <a href="登入畫面.php">登出</a></h1>
        </header>
        <?php
                require_once("login.php");
                $account=$_SESSION["account"];
                $qry=("SELECT * FROM `與會人員` WHERE `帳號`='$account';");
                $result=mysqli_query($sql,$qry);
                $value=mysqli_fetch_assoc($result);
                $_SESSION["ID_number"]=$value["身分證字號"];
        ?>
        <nav>
            <ul class="flex-nav">
                <li><a href="會議資料2.php">會議資料</a></li>
                <li><a href="人員資料2.php">人員資料</a></li>
                <li><a href="編輯個人資料2-1.php?ID=<?php echo $value["身分證字號"]; ?>">編輯個人資料</a></li>
            </ul>
        </nav>
        <h2>近期會議</h2>
    </body>
</html>