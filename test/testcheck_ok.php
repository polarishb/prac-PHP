<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $id = $_POST["id"];
    $passwd = $_POST["passwd"];
    $sql = "select * from member where id='$id'";

    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret);

    $passwd = sha1($passwd, 0);
    $passwd_hash = $row['pw'];

    mysqli_close($con);

    if($passwd == $passwd_hash )
       header("Location: testmodify.php?id=".$row[0]);
    else
        echo "비밀번호가 틀립니다.";
?>