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
        <nav>
            <ul class="flex-nav">
                <?php 
                    $ID=$_SESSION["ID_number"];
                ?>
                <li><a href="會議資料2.php">會議資料</a></li>
                <li><a href="人員資料2.php">人員資料</a></li>
                <li><a href="編輯個人資料2-1.php?ID=<?php echo $ID ?>">編輯個人資料</a></li>
            </ul>
        </nav>
        <?php
            require_once("login.php");
            $meet_name=$_GET['meet_name'];
            $qry = "SELECT * FROM `會議記錄`WHERE `會議名稱`='$meet_name';";
            $result = mysqli_query($sql,$qry);
            if ($result) {
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $datas[] = $row;
                    }
                }
                mysqli_free_result($result);
            }
            else {
                echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($sql);
            }
            $qry = "SELECT * FROM `討論事項`WHERE `會議名稱`='$meet_name';";
            $result2 = mysqli_query($sql,$qry);
            if ($result2) {
                if (mysqli_num_rows($result2)>0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $datas2[] = $row2;
                    }
                }
                mysqli_free_result($result2);
            }
            else {
                echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($sql);
            }
            $qry = "SELECT * FROM `報告事項`WHERE `會議名稱`='$meet_name';";
            $result3 = mysqli_query($sql,$qry);
            if ($result3) {
                if (mysqli_num_rows($result3)>0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $datas3[] = $row3;
                    }
                }
                mysqli_free_result($result3);
            }
            else {
                echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($sql);
            }
        ?>
        
        <table align="center" border="1" width="600" cellpadding="2">
            <?php if(!empty($datas)): ?>
                
                <?php foreach ($datas as $key => $row) :?>
                <tr>
                    <td>會議名稱</td>
                    <td><?php echo $row['會議名稱']; ?></td>
                </tr>
                <tr>
                    <td>會議種類</td>
                    <td><?php echo $row['會議種類']; ?></td>
                </tr>
                <tr>
                    <td>開會時間</td>
                    <td><?php echo $row['開會時間']; ?></td>
                </tr>
                <tr>
                    <td>開會地點</td>
                    <td><?php echo $row['開會地點']; ?></td>
                </tr>
                <tr>
                    <td>主席</td>
                    <td><?php echo $row['主席']; ?></td>
                </tr>
                <tr>
                    <td>記錄人員</td>
                    <td><?php echo $row['記錄人員']; ?></td>
                </tr>
                <tr>
                    <td>參與人員</td>
                    <td>
                        <?php  
                            require_once("login.php");
                            $qry="SELECT 姓名 FROM 參與人員 NATURAL JOIN 與會人員 WHERE `會議名稱`='$meet_name';";
                            $result=mysqli_query($sql,$qry); 
                            if ($result) {
                                if (mysqli_num_rows($result)>0) {
                                    while ($row4 = mysqli_fetch_assoc($result)) {
                                        $datas4[] = $row4;
                                    }
                                }
                                mysqli_free_result($result);
                            }
                            else {
                                echo "{$qry} 語法執行失敗，錯誤訊息: " . mysqli_error($sql);
                            }
                        ?>
                        <?php if(!empty($datas4)): ?>
                             <?php foreach ($datas4 as $key => $row4) :?>
                                <p><?php echo $row4['姓名']?></p>
                                <?php if(($key+1)%4==0&&$key>1):?>
                                    </br>
                                <?php endif; ?>
                             <?php endforeach; ?>
                        <?php else:  ?>
                        查無資料
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>主席致詞</td>
                    <td><?php echo $row['主席致詞']; ?></td>
                </tr>
                <tr>
                    <td>臨時動議</td>
                    <td><?php echo $row['臨時動議']; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else:  ?>
                查無資料
                <?php endif; ?>
                <?php if(!empty($datas2)): ?>
                <tr><td><b>討論事項</b></td></tr>
                <?php foreach ($datas2 as $key => $row2) :?>
                <tr>
                    <td>提案編號</td>
                    <td><?php echo $row2['提案編號']; ?></td>
                </tr>
                <tr>
                    <td>案由</td>
                    <td><?php echo $row2['案由']; ?></td>
                </tr>
                <tr>
                    <td>說明</td>
                    <td><?php echo $row2['說明']; ?></td>
                </tr>
                <tr>
                    <td>決議</td>
                    <td><?php echo $row2['決議']; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else:  ?>
                <tr>
                    <td><?php echo "目前無討論事項" ?></td>
                </tr>
                <?php endif; ?>
                <?php if(!empty($datas3)): ?>
                <tr><td><b>報告事項</b></td></tr>
                <?php foreach ($datas3 as $key => $row3) :?>
                <tr>
                    <td>事項編號</td>
                    <td><?php echo $row3['事項編號']; ?></td>
                </tr>
                <tr>
                    <td>內容</td>
                    <td><?php echo $row3['報告內容']; ?></td>
                </tr>
               
                <?php endforeach; ?>
                <?php else:  ?>
                <tr>
                    <td><?php echo "目前無報告事項" ?></td>
                </tr>
                <?php endif; ?>
         </table>
    </body>     
</html>