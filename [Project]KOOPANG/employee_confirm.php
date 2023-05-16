<?php
    $con = mysqli_connect("write-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    $id = $_POST["id"];
    $department = $_POST["department"];
    switch ($department) {
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

    $sql = "update members set department = '$department' , level = '$level' where member_id = '$id';";

    $ret = mysqli_query($con, $sql);
    $con = mysqli_close($con);

    echo "<script>alert('소속이 변경되었습니다.')</script>";
    echo "<script>location.replace('employee.php');</script>";

?>