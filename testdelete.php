<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $id = $_GET["id"];
    $sql = "delete from member where id='$id'";
    $ret = mysqli_query($con,$sql);

    if($ret) echo "$id 이 삭제됨";
    else echo "삭제 실패<br>실패원인 : ".mysqli_error($con);

    mysqli_close($con);
    header("Location: testlist.php");

?>