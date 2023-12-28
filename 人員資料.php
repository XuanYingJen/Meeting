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
            <h1><a href="首頁.php">&nbsp高雄大學資訊工程系會議管理系統</a><?php for($i=0;$i<90;$i++){echo "&nbsp;";}echo $account?> <a href="登入畫面.php">登出</a></h1>
        </header>
        <nav>
            <ul class="flex-nav">
                <li><a href="新增會議.php">新增會議</a></li>
                <li><a href="會議資料.php">會議資料</a></li>
                <li><a href="新增人員資料1-1.php">新增人員資料</a></li>
                <li><a href="人員資料.php">人員資料</a></li>
            </ul>
        </nav>
        </br>
        <table  align="center" border="1" width="300" cellpadding="2">
            <tr>
                <td>身分</td>
                <td>姓名</td>
                <td>手機</td>
                <td>編輯</td>
                <td>刪除</td>
            </tr>
            <?php
                require_once("login.php");
                $qry=("SELECT * FROM `與會人員`;");
                $result=mysqli_query($sql,$qry);
                if ($result) {
                    if (mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $datas[] = $row;
                        }
                    }
                    mysqli_free_result($result);
                }
            ?>
                <?php foreach($datas as $value):?>
                <tr>
                <td><?php echo $value['身分']?></td>
                <td><?php echo $value['姓名']?></td>
                <td><?php echo $value['手機']?></td>
                <td><a href="人員資料編輯.php?ID=<?php echo $value['身分證字號']?>">編輯</a></td>
                <td><a href="delete_member.php?ID=<?php echo $value['身分證字號']?>">刪除</a></td>
                </tr>
                <?php endforeach; ?>
   
        </table>
    </body>
</html>