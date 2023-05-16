<?php
   session_start();
    $con = mysqli_connect("read-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    $username = $_POST['id'];
    $userpass = $_POST['password'];
    $password = sha1($userpass, 0);

    $sql = "SELECT * FROM members WHERE member_id = '$username' AND member_passwd = '$password';";
    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret);
    $con = mysqli_close($con);

    if ($row != null) {
        $_SESSION['username'] = $row['member_id'];
        $_SESSION['name'] = $row['name'];

        if($row['level'] == 0)
            $_SEESION['perm'] = '승인대기';
        else if ($row['level'] == 2)
        $_SEESION['perm'] = '영업';
        else if ($row['level'] == 3)
        $_SEESION['perm'] = '물류';
        else if ($row['level'] == 4)
        $_SEESION['perm'] = '인사';
        else if ($row['level'] == 5)
        $_SEESION['perm'] = 'IT';
        else
        $_SEESION['perm'] = '관리자';
        echo "<script>location.replace('index.php');</script>";
        exit;
    }

    if($row == null){
        echo "<script>alert('아이디와 비밀번호를 확인하세요.')</script>";
        echo "<script>location.replace('login.html');</script>";
        exit;
    }
?>