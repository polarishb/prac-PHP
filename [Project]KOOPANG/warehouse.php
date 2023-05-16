<?php
session_start();
if($_SESSION['level'] != 3 && $_SESSION['level'] != 10) {
    echo "<script>alert('접근권한이 없습니다.')</script>";
    echo "<script>location.replace('index.php');</script>";
}
else {
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $perm = $_SESSION['level'];

    $con = mysqli_connect("read-db.koopang.com", "admin", "P@ssw0rd", "webDB");
    $sql = "select * from warehouse order by name asc";
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
                        <th>품목</th><th>수량</th><th>위치</th>
                    </tr>   
                    <?php
                        while($row=mysqli_fetch_array($ret)){
                            echo "<tr align=center>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td><form method='post'>";
                            echo $row['quantity']." ";
                            echo "<input type='hidden' name='quantity' value='".$row['quantity']."'>";
                            echo "<input type='hidden' name='id' value='".$row['item_id']."'>";
                            echo "<input type='submit' value='＋' formaction='warehouse_plus.php' > <input type='submit' value='－' formaction='warehouse_minus.php' ></form></td>";
                            echo "<td>".$row['location']."</td>";
                            echo "</tr>";
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