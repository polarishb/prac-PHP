<?php
    $con = mysqli_connect("read-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    $id = $_GET["id"];
    $sql = "delete from members where member_id = '$id'";

    $ret = mysqli_query($con, $sql);
    $con = mysqli_close($con);

    if($ret){
        echo "<script>alert('계정이 삭제되었습니다.')</script>";
        echo "<script>location.replace('account.php');</script>";
    }

?>