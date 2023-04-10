<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $hakbun = $_GET["hakbun"];
    $sql = "select * from sungjuk where hakbun='$hakbun'";

    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret);

    $hakbun = $row['hakbun'];
    $name = $row['name'];
    $kor = $row['kor'];
    $eng = $row['eng'];
    $math = $row['math'];

    mysqli_close($con);
?>
<h3> 성적 수정 </h3>
<form method="post" action="smodify_ok.php">
    학  번 : <input type="text" name="hakbun" value="<?php echo $hakbun ?>" readonly><br>
    이  름 : <input type="text" name="name" value="<?php echo $name ?>" readonly><br>
    국어점수 : <input type="text" name="kor" value="<?php echo $kor ?>"><br>
    영어점수 : <input type="text" name="eng" value="<?php echo $eng ?>"><br>
    수학점수 : <input type="text" name="math" value="<?php echo $math ?>"><br>
    <br>
    <input type="submit" value="성적 수정">
</form>