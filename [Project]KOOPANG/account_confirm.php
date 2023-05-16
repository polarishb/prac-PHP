<?php
    $con = mysqli_connect("write-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    $id = $_GET["id"];
    switch ($_GET["department"]) {
        case '영업':
            $level = 2;
            break;
        case '물류':
            $level = 3;
            break;
        case '인사':
            $level = 4;
            break;
        case 'IT':
            $level = 5;
            break;
    }
    $sql = "update members set level = $level where member_id = '$id';";

    $ret = mysqli_query($con, $sql);
    $con = mysqli_close($con);

    if($ret){
        echo "<script>alert('계정이 승인되었습니다.')</script>";
        echo "<script>location.replace('account.php');</script>";
    }
?>