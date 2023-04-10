<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $hakbun = $_POST["hakbun"];
    $name = $_POST["name"];
    $kor = $_POST["kor"];
    $eng = $_POST["eng"];
    $math = $_POST["math"];
    $tot = $kor + $eng + $math;
    $sub = array($kor, $eng, $math);
    $avg = $tot / count($sub);

    $sql = "update sungjuk set kor = $kor, eng = $eng, math = $math, avg = $avg, tot = $tot where hakbun = $hakbun";

    $ret = mysqli_query($con, $sql);
    if($ret)
        echo "성적 수정 성공";
    else
        echo "성적 수정 실패 : ".mysqli_error($con);
    
    $con = mysqli_close($con);
    header("Location: slist.php");
?>