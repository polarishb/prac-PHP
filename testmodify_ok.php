<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $id = $_POST["id"];
    $passwd = $_POST["passwd"];
    $age = $_POST["age"];

    $sql = "update member set age = $age, pw = sha1('$passwd') where id = '$id';";

    $ret = mysqli_query($con, $sql);
    if($ret)
        echo "회원 정보 수정 성공";
    else
        echo "회원 정보 수정 실패 : ".mysqli_error($con);
    
    $con = mysqli_close($con);
    header("Location: testlist.php");
?>