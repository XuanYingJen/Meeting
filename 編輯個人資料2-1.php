<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="上方工具列及標題.css" href="人員資料編輯.css"/>
    </head>
    <body>
    <?php session_start();
        $account = $_SESSION['account'];?>
        <header class="home">
            <img src="CSIE.jpg" width="50" height="50" style="float: left;">
            <h1><a href="首頁2.php">&nbsp高雄大學資訊工程系會議管理系統</a><?php for($i=0;$i<90;$i++){echo "&nbsp;";}echo $account?> <a href="登入畫面.php">登出</a></h1>
        </header>
        <?php  $ID=$_SESSION["ID_number"]; ?>
        <nav>
            <ul class="flex-nav">
                <li><a href="會議資料2.php">會議資料</a></li>
                <li><a href="人員資料2.php">人員資料</a></li>
                <li><a href="編輯個人資料2-1.php?ID=<?php echo $ID;?>">編輯個人資料</a></li>
            </ul>
        </nav>
        <?php
            require_once("login.php");
            $id=$_GET["ID"];
            $_SESSION["ID"]=$id;
            $qry="SELECT * FROM `與會人員` WHERE `身分證字號`= '$id';";
            $result=mysqli_query($sql,$qry);
            $temp=mysqli_fetch_assoc($result);
            $ID=$temp["身分"];
            $_SESSION["identity"]=$ID;
        ?>
        <form action="change_member_info2.php" method="post"><div class="form">
            <h2>一、修改基本資料</h2>
            <p>姓名&nbsp&nbsp<input type="text" name="name" value=<?php echo $temp['姓名'] ?>></p>
            <p>性別&nbsp&nbsp
                <?php if($temp["性別"]=="男"):?>
                    <input type=radio name = sex value=男 checked = "true">男
                    <input type=radio name = sex value=女>女
                <?php elseif($temp["性別"]=="女"):?>
                    <input type=radio name = sex value=男 >男
                    <input type=radio name = sex value=女 checked = "true">女
                <?php endif;?>
            </p>
            <p>手機&nbsp&nbsp<input type="text" name="phone" value=<?php echo $temp['手機'] ?>></p>
            <p>Email&nbsp<input type="text" name="email" value=<?php echo $temp['Email'] ?>></p>
            <p>密碼&nbsp<input type="text" name="password" value=<?php echo $temp['密碼'] ?>></p>
            <!-- <p>身分&nbsp
                <select name="identity">
                    <option value="professor" >系上老師</option>
                    <option value="assistent" >系助理</option>
                    <option value="outsideTeacher" >校外老師</option>
                    <option value="expert" >業界專家</option>
                    <option value="student" >學生代表</option>
                </select>
            </p>         -->
        
        
        <?php if($ID=='系上老師'): ?>
            <!--系上老師-->
            <?php
                $id=$temp["身分證字號"];
                $qry="SELECT * FROM `系上老師` WHERE `身分證字號`= '$id';";
                $result=mysqli_query($sql,$qry);
                $row=mysqli_fetch_assoc($result);
            ?>
            <?php if($row["職級"]=="教授"): ?>
            <p>職級&nbsp&nbsp
                <input type=radio name = rank value=教授 checked="true">教授
                <input type=radio name = rank value=副教授>副教授
                <input type=radio name = rank value=助理教授>助理教授
            </p>
            <?php elseif($row["職級"]=="副教授"): ?>
                <p>職級&nbsp&nbsp
                <input type=radio name = rank value=教授>教授
                <input type=radio name = rank value=副教授 checked="true">副教授
                <input type=radio name = rank value=助理教授>助理教授
            </p>
            <?php elseif($row["職級"]=="助理教授"): ?>
                <p>職級&nbsp&nbsp
                <input type=radio name = rank value=教授>教授
                <input type=radio name = rank value=副教授>副教授
                <input type=radio name = rank value=助理教授 checked="true">助理教授
            </p>
            <?php endif; ?>
            <p>辦公室電話&nbsp<input type="tel" name="tel" value=<?php echo $row["辦公室電話"] ?>></p>
        <?php elseif($ID=='系助理'): ?>    
            <!--系助理-->
            <?php
                $id=$temp["身分證字號"];
                $qry="SELECT * FROM `系助理` WHERE `身分證字號`= '$id';";
                $result=mysqli_query($sql,$qry);
                $row=mysqli_fetch_assoc($result);
            ?>
            <p>辦公室電話&nbsp<input type="tel" name="tel" value=<?php echo $row["辦公室電話"] ?>></p>
        <?php elseif($ID=='校外老師'): ?>
            <!--校外老師-->
            <?php
                $id=$temp["身分證字號"];
                $qry="SELECT * FROM `校外老師` WHERE `身分證字號`= '$id';";
                $result=mysqli_query($sql,$qry);
                $row=mysqli_fetch_assoc($result);
            ?>
            <p>任職學校&nbsp<input type="text" name="school" value=<?php echo $row["任職學校"] ?>></p>
            <p>系所&nbsp<input type="text" name="department" value=<?php echo $row["系所"] ?>></p>
            <p>職稱&nbsp<input type="text" name="job_name" value=<?php echo $row["職稱"] ?>></p>
            <p>辦公室電話&nbsp<input type="tel" name="tel" value=<?php echo $row["辦公室電話"] ?>></p>
            <p>聯絡地址&nbsp<input type="text" class="address" name="address" value=<?php echo $row["聯絡地址"] ?>></p>
            <p>銀行(郵局)帳號&nbsp<input type="text" name="bank_account" value=<?php echo $row["銀行帳號"] ?>></p>
        <!--業界專家-->
        <?php elseif($ID == "業界專家"): ?>
                <?php 
                    
                    $qry="SELECT * FROM `業界專家` WHERE `身分證字號`='$id';";
                    $result=mysqli_query($sql,$qry);
                    $row=mysqli_fetch_assoc($result);
                ?>
                <p>任職公司&nbsp<input type="text" name=company value=<?php echo $row["任職公司"]?>></p>
                <p>職稱&nbsp<input type="text" name=job_name value=<?php echo $row["職稱"]?>></p>
                <p>辦公室電話&nbsp<input type="tel" name=tel value=<?php echo $row["辦公室電話"]?>></p>
                <p>聯絡地址&nbsp<input type="text" name=address value=<?php echo $row["聯絡地址"]?>></p>
                <p>銀行(郵局)帳號&nbsp<input type="text" name=bank_account value=<?php echo $row["銀行帳號"]?>></p>

            <!--學生代表-->
        <?php elseif($ID == "學生代表"): ?>
            <?php 
                $qry="SELECT * FROM `學生代表` WHERE `身分證字號`='$id';";
                $result=mysqli_query($sql,$qry);
                $temp=mysqli_fetch_assoc($result);
            ?>
            <p>學號&nbsp<input type="text" name=student_ID value=<?php echo $temp["學號"]?>></p>
            <p>學制&nbsp
                <?php if($temp["學制"]=="大學部"):?>
                    <input type=radio name = schoolSystem value=university checked="true">大學部
                    <input type=radio name = schoolSystem value=master>研究所
                <?php else:?>
                    <input type=radio name = schoolSystem value=university>大學部
                    <input type=radio name = schoolSystem value=master checked="true">研究所
                <?php endif;?>
            </p>
            <p>年級&nbsp
                <select name="degree">
                    <?php if($temp["年級"]=="一"):?>
                        <option value=一 selected="true">一</option>
                        <option value=二>二</option>
                        <option value=三>三</option>
                        <option value=四>四</option>
                        <option value=五>五</option>
                        <option value=六>六</option>
                    <?php elseif($temp["年級"]=="二"):?>
                        <option value=一>一</option>
                        <option value=二 selected="true">二</option>
                        <option value=三>三</option>
                        <option value=四>四</option>
                        <option value=五>五</option>
                        <option value=六>六</option>
                    <?php elseif($temp["年級"]=="三"):?>
                        <option value=一>一</option>
                        <option value=二>二</option>
                        <option value=三 selected="true">三</option>
                        <option value=四>四</option>
                        <option value=五>五</option>
                        <option value=六>六</option>
                    <?php elseif($temp["年級"]=="四"):?>
                        <option value=一>一</option>
                        <option value=二>二</option>
                        <option value=三>三</option>
                        <option value=四 selected="true">四</option>
                        <option value=五>五</option>
                        <option value=六>六</option>
                    <?php elseif($temp["年級"]=="五"):?>
                        <option value=一>一</option>
                        <option value=二>二</option>
                        <option value=三>三</option>
                        <option value=四>四</option>
                        <option value=五 selected="true">五</option>
                        <option value=六>六</option>
                    <?php elseif($temp["年級"]=="六"):?>
                        <option value=一>一</option>
                        <option value=二>二</option>
                        <option value=三>三</option>
                        <option value=四>四</option>
                        <option value=五>五</option>
                        <option value=六 selected="true">六</option>
                    <?php endif;?>
                </select>
            </p> 
        <?php endif;?>      
        <button type="submit">儲存</button>
        </div></form>
    </body>
</html>