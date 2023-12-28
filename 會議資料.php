<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"></meta>
    <title>高雄大學資訊工程系會議管理系統</title>
    <link rel="stylesheet" href="上方工具列及標題.css" href="會議資料.css"/>
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
    
    <table align="center" border="1" width="600" cellpadding="2">
        <?php
            require_once("login.php");
            $qry = "SELECT `會議名稱`,`會議種類` FROM `會議記錄`;";
            $result = mysqli_query($sql,$qry);
            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            }
            if(!empty($datas)):
        ?>
        <tr>
            <td>會議名稱</td>
            <td>會議種類</td>
            <td>編輯</td>
            <td>刪除</td>
        </tr>
        <?php
            foreach ($datas as $key => $value):
        ?>
        <tr>
            <td>
                <a href="查看會議資料.php?meet_name=<?php echo $value['會議名稱']; ?>"><?php echo $value['會議名稱']; ?></a>
            </td>
            <td>
                <?php echo $value['會議種類']; ?>
            </td>
            <td>
                <a href="會議資料編輯.php?meet_name=<?php echo $value['會議名稱']; ?>">編輯</a>
            </td>
            <td>
                <a href="delete_meeting.php?meet_name=<?php echo $value['會議名稱']; ?>">刪除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>

</body>
    
</html>