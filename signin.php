<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $id = $_POST["id"];
    $passwd = $_POST["passwd"];
    $age = $_POST["age"];

    // $sql = "insert into member values('$id', '$passwd', '$age');";
    $sql = "insert into member values('$id', sha1('$passwd'), $age);";
    

    // echo $sql;
    $ret = mysqli_query($con, $sql);
    
    // $sql = "insert into member (id, pw, age) values('$id', hex(aes_encrypt('$passwd', sha2('pass', 512))), $age);";
    // $ret =  mysqli_query($con, $sql);
    if($ret)
        echo "회원 가입 성공";
    else
        echo "회원 가입 실패 : ".mysqli_error($con);
    
    $con = mysqli_close($con);
    header("Location: index.html");
?>