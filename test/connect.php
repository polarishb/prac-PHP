<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam")
    or die("db 연결 실패");

    if($con) {
        echo "DB 연결  성공";
    }
    else {
        echo "DB 연결 실패";
    }
?>