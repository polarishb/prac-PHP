<?php
session_start();
if($_SESSION['level'] != 4 && $_SESSION['level'] != 10) {
    echo "<script>alert('접근권한이 없습니다.')</script>";
    echo "<script>location.replace('index.php');</script>";
}
else {
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $perm = $_SESSION['level'];

    $con = mysqli_connect("read-db.koopang.com", "admin", "P@ssw0rd", "webDB");
    $sql = "select * from members order by department asc";
    $ret = mysqli_query($con, $sql);
    $con = mysqli_close($con);
} 
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Koopang | 사내 내부망 - 계정 관리</title>
</head>
<body>
    <header>
    </header>
    <nav>
        <div class="corp_name">
            <h1>
                <span style="color:#521110">KOO</span>
                <span style="color:#D73227">P</span>
                <span style="color:#E99923">A</span>
                <span style="color:#92BA3E">N</span>
                <span style="color:#50A3D9">G</span>
            </h1>
            <div class="nav_menu">
                <ul>
                    <?php
                        if($perm == 0){
                            echo "<li><a href='index.php'>홈</a></li>";
                        }
                        else if($perm == 3){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='warehouse.php'>재고 관리</a></li>";
                        }
                        else if($perm == 4){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='employee.php'>직원 관리</a></li>";
                        }
                        else if($perm == 5){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='account.php'>계정 관리</a></li>";
                        }
                        else if($perm > 5){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='warehouse.php'>재고 관리</a></li>";
                            echo "<li><a href='employee.php'>직원 관리</a></li>";
                            echo "<li><a href='account.php'>계정 관리</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <ul class="login_menu">
            <li><a href="member_page.php" style="text-decoration-line: underline"><?php echo $username; ?></a></li>
            <li><a href="mail.php?id=<?php echo $username ?>">메일함</a></li>
            <li><a href="logout.php">로그아웃</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <p class="table">
                <table>
                    <tr>
                        <th>계정</th><th>이름</th><th>소속</th>
                    </tr>   
                    <?php
                        while($row=mysqli_fetch_array($ret)){
                            if($row['level'] != 0 && $row['level'] != 10){
                                echo "<tr align=center>";
                                echo "<td>".$row['member_id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>";
                                echo "<form action='employee_confirm.php' method='post'>";
                                if ($row['department'] == '영업'){
                                    echo "<select name='department'><option value='영업' selected disabled>영업팀</option><option value='물류'>물류팀</option><option value='인사'>인사팀</option><option value='IT'>IT팀</option></select>";
                                }
                                else if ($row['department'] == '물류'){
                                    echo "<select name='department'><option value='영업'>영업팀</option><option value='물류' selected disabled>물류팀</option><option value='인사'>인사팀</option><option value='IT'>IT팀</option></select>";
                                }
                                else if ($row['department'] == '인사'){
                                    echo "<select name='department'><option value='영업'>영업팀</option><option value='물류'>물류팀</option><option value='인사' selected disabled>인사팀</option><option value='IT'>IT팀</option></select>";
                                }
                                else if ($row['department'] == 'IT'){
                                    echo "<select name='department'><option value='영업'>영업팀</option><option value='물류'>물류팀</option><option value='인사'>인사팀</option><option value='IT' selected disabled>IT팀</option></select>";
                                }
                                echo "<input type='hidden' name='id' value='".$row['member_id']."' />";
                                echo "<input type='hidden' name='level' value='".$row['level']."' />";
                                echo " <input type='submit' value='변경'>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
            </p>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>