<?php
    $con = mysqli_connect("localhost", "root", "1234", "exam") or die("db 연결 실패");

    $sql = "select * from sungjuk order by hakbun asc";
    $ret = mysqli_query($con, $sql);

    echo "성적 처리 조회 결과 <br>";
    echo "<table border=1 width=600>";
    echo "<tr>";
    echo "<th>학번</th><th>이름</th><th>국어</th><th>영어</th><th>수학</th><th>총점</th><th>평균</th><th>수정</th><th>삭제</th>";
    echo "</tr>";
    while($row=mysqli_fetch_array($ret)){
        echo "<tr align=center>";
        echo "<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>"."<a href='smodify.php?hakbun=".$row[0]."' onclik='confirmModify()'>수정</a></td>";
        echo "<td>"."<a href='sdelete.php?hakbun=".$row[0]."' onclik='confirmDelete()'>삭제</a></td>";
        echo "</tr>";   
    }
    echo "</table>";


    
?>
<script language="JavaScript"  type="text/javascript" >
    function confirmDelete() {
        var del = confirm("삭제하시겠습니까?");
        if (del){
            
        }
    }
</script>