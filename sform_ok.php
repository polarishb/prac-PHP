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

    $sql = "insert into sungjuk values('$hakbun', '$name', $kor, $eng, $math, $tot, $avg)";

    $ret = mysqli_query($con, $sql);
    if($ret)
        echo "성적 입력 성공";
    else
        echo "성적 입력 실패 : ".mysqli_error($con);
    
    $con = mysqli_close($con);
    header("Location: index.html");
?>