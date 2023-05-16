<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>location.replace('login.html');</script>";
}
else {
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    
    $con = mysqli_connect("read-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    if(!$_SESSION['level']){
        $sql = "SELECT * FROM members WHERE member_id = '$username'";
        $ret = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($ret);
        $con = mysqli_close($con);
        $_SESSION['level'] = $row['level'];
    }
} 
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Koopang | 사내 내부망 - 메인 페이지</title>
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
                        if($_SESSION['level'] == 0){
                            echo "<li><a href='index.php'>홈</a></li>";
                        }
                        else if($_SESSION['level'] == 2){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                        }
                        else if($_SESSION['level'] == 3){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='warehouse.php'>재고 관리</a></li>";
                        }
                        else if($_SESSION['level'] == 4){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='employee.php'>직원 관리</a></li>";
                        }
                        else if($_SESSION['level'] == 5){
                            echo "<li><a href='index.php'>홈</a></li>";
                            echo "<li><a href='#'>게시판</a></li>";
                            echo "<li><a href='account.php'>계정 관리</a></li>";
                        }
                        else if($_SESSION['level'] > 5){
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
            <li><a href="member_page.php?id=<?php echo $username ?>" style="text-decoration-line: underline"><?php echo $username; ?></a></li>
            <li><a href="mail.php?id=<?php echo $username ?>">메일함</a></li>
            <li><a href="logout.php">로그아웃</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
                if($_SESSION['level'] > 0){
                    echo "<p>".$name."님, 환영합니다.</p>";
                }
                else {
                    echo "<p>관리자의 승인을 대기중입니다.</p>";
                }
            ?>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>