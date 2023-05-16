<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $hakbun = $_GET["hakbun"];
    $sql = "delete from sungjuk where hakbun='$hakbun'";
    $ret = mysqli_query($con,$sql);

    if($ret) echo "학번 : $hakbun 이 삭제됨";
    else echo "삭제 실패<br>실패원인 : ".mysqli_error($con);

    mysqli_close($con);
    header("Location: slist.php");

?>