<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $sql = "select * from member order by id asc";
    $ret = mysqli_query($con, $sql);

    echo "회원 정보<br>";
    echo "<table border=1 width=600>";
    echo "<tr>";
    echo "<th>ID</th><th>비밀번호</th><th>나이</th><th>수정</th><th>삭제</th>";
    echo "</tr>";
    while($row=mysqli_fetch_array($ret)){
        echo "<tr align=center>";
        echo "<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>"."<a href='testcheck.php?id=".$row[0]."'>수정</a></td>";
        echo "<td>"."<a href='testdelete.php?id=".$row[0]."'>삭제</a></td>";
        echo "</tr>";   
    }
    echo "</table>";  
?>