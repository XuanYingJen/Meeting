<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <title>高雄大學資訊工程系會議管理系統</title>
        <link rel="stylesheet" href="上方工具列及標題.css"/>
        <link rel="stylesheet" href="新增會議.css"/>
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
        <form action="add_meeting.php" method="post" >
            <table  style="border:3px rgb(115, 115, 115) solid;" border="1" align="center" width="600" cellpadding=2>
                <tr><td class="name">會議名稱</td><td><input type="text" name="name"/></td></tr>
                <tr><td class="name">會議種類</td>
                    <td><select name="category">
                            <option value="系務會議">系務會議</option>
                            <option value="系教評會">系教評會</option>
                            <option value="系課程委員會">系課程委員會</option>
                            <option value="招生暨學生事務委員會">招生暨學生事務委員會</option>
                            <option value="系發展委員會">系發展委員會</option>
                    </select> </td>
                </tr>
                <tr><td class="name">開會時間</td><td><input type="date" name="date"/>&nbsp&nbsp<input type="time" name="time"/></td></tr>
                <tr><td class="name">開會地點</td><td><input type="text" name="location"/></td></tr>
                <tr><td class="name">討論事項</td>
                    <td>提案編號<input type="text" name="num"/>
                        案由<input type="text" name="reason"/>
                        說明<input type="text" name="explain"/>
                </td></tr>
                <tr><td class="name">與會人員</td>
                    <td>
                        <?php
                            require_once("login.php");
                            $qry="SELECT `姓名` FROM `與會人員`;";
                            $result=mysqli_query($sql,$qry); 
                            if ($result) {
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $datas[] = $row;
                                    }
                                }
                                mysqli_free_result($result);
                            }
                            else {
                                echo "{$qry} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
                            }
                        ?>
                        <?php if(!empty($datas)): ?>
                             <?php foreach ($datas as $key => $row) :?>
                                <input type="checkbox" name="member[]"value="<?php echo $row['姓名']?>"><?php echo $row['姓名']?>
                                <?php if(($key+1)%4==0&&$key>1):?>
                                    </br>
                                <?php endif; ?>
                             <?php endforeach; ?>
                        <?php else:  ?>
                        查無資料
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- <tr><td>與會人員</td><td><input type="text"/></td></tr> 可以另外寫table--> 
                <!-- <tr><td>討論事項(案由)</td><td><input type="text"/></td></tr> 可以另外寫table-->
                <!-- <tr><td>會議議程</td><td><input type="file"/></td></tr> -->
            </table>
                        </br>
            <center><button type="submit" position = "center">新增會議</button></center>
        </form>
        
    </body>
</html>