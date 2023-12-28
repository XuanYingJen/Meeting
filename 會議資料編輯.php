<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="上方工具列及標題.css" href="會議資料編輯.css"/>
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
        <form action="change_meet_info.php" method="post">
            <?php
                require_once("login.php");
               
                $meeting_name=$_GET["meet_name"];
                $_SESSION["meeting_name"]= $meeting_name;
                

                $meeting_qry="SELECT * FROM `會議記錄` WHERE `會議名稱`='$meeting_name';";
                $meeting_result = mysqli_query($sql,$meeting_qry);
                $meeting=mysqli_fetch_assoc($meeting_result);

                $discussion_qry="SELECT * FROM `討論事項` WHERE `會議名稱`='$meeting_name';";
                $discussion_result = mysqli_query($sql,$discussion_qry);
                $discussion=mysqli_fetch_assoc($discussion_result);
                
                $report_qry="SELECT * FROM `報告事項` WHERE `會議名稱`='$meeting_name';";
                $report_result = mysqli_query($sql,$report_qry);
                $report=mysqli_fetch_assoc($report_result);

                $track_info_qry="SELECT * FROM `決議事項追蹤資料` WHERE `會議名稱`='$meeting_name';";
                $track_info_result = mysqli_query($sql,$track_info_qry);
                $track_info=mysqli_fetch_assoc($track_info_result);
            ?>
            <p>主席&nbsp&nbsp<input type="text" name=chairman value=<?php echo $meeting["主席"]?>></p>
            <p>紀錄人員&nbsp&nbsp<input type="text" style="width:130px;" name=recoder value=<?php  echo $meeting["記錄人員"]?>></p>
            <p>主席致詞</p>
            <textarea style="width:600px;height:200px;" name=chairman_speech><?php  echo $meeting["主席致詞"]?></textarea>
            
            <p>臨時動議</p>
            <textarea style="width:600px;height:200px;" name=p_motion><?php  echo $meeting["臨時動議"]?></textarea>
            <hr/>
            <h2><a href="新增報告事項.php">新增報告事項</a></h2>
            
            <hr/>
            <h2><a href="新增討論事項.php">新增討論事項</a></h2>
           
            <hr/>
            <h2>決議事項追蹤資料：</h2>
            <?php if(mysqli_num_rows($track_info_result)>0): ?>
                <p>決議事項</p>
                <textarea style="width:600px;height:200px;" name=resolutions><?php echo $track_info["決議事項"]?></textarea>
                <p>執行狀況</p>
                <input type="text" style="width:600px;" name=implementation value=<?php echo $track_info["執行情況"] ?>>
            <?php else: ?>
                <p>決議事項</p>
                <textarea style="width:600px;height:200px;" name=resolutions></textarea>
                <p>執行狀況</p>
                <input type="text" style="width:600px;" name=implementation>
            <?php endif; ?>
            <button type ="submit">儲存</button>
        </form>

        
    </body>
</html>