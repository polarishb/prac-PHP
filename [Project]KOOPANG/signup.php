<?php
    $con = mysqli_connect("write-db.koopang.com", "admin", "P@ssw0rd", "webDB") or die("db 연결 실패");

    $id = $_POST["id"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    $name = $_POST["name"];

    $sql = "select * from members where member_id = '$id';";
    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret);

    if (!$row == null){
        $con = mysqli_close($con);
        echo "<script>alert('이미 가입된 아이디입니다.')</script>";
        echo "<script>location.replace('signup.html');</script>";
    }
    else {
        $sql = "insert into members values('$id', sha1('$password'), 0, '$department', '$name');";
        $ret = mysqli_query($con, $sql);

        $con = mysqli_close($con);
        echo "<script>alert('회원가입 되었습니다.')</script>";
        echo "<script>location.replace('index.php');</script>";
    }
?>