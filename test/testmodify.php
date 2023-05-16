<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $id = $_GET["id"];
    $sql = "select * from member where id='$id'";

    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret);

    $id = $row['id'];
    $passwd = $row['pw'];
    $age = $row['age'];

    mysqli_close($con);
?>
<h3> 회원 정보 수정 </h3>
<form method="post" action="testmodify_ok.php">
    ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
    비밀번호 : <input type="password" name="passwd" value="passwd"><br>
    나이&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="age" value="<?php echo $age ?>"><br>
    <br>
    <input type="submit" value="수정">
</form>