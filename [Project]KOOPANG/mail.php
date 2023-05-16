<?php
session_start();

    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $perm = $_SESSION['level'];

    $con = mysqli_connect("read-db.koopang.com", "admin", "polarispass", "webDB");
    $sql = "select * from mail where to_id = '$username' order by time asc;";
    $ret = mysqli_query($con, $sql);
    $con = mysqli_close($con);
 
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Koopang | 사내 내부망 - 메일함</title>
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
            <div class="mailbox">
            <?php 
                while($row=mysqli_fetch_array($ret)){
                    echo "<div class='mail'>";
                        echo "<div class='mail_title'>";
                                echo $row['title'];
                        echo "</div>";
                        echo "<div class='mail_from'>";
                                echo $row['from_id'];
                        echo "</div>";
                        echo "<div class='mail_to'>";
                                echo $row['to_id'];
                        echo "</div>";
                        echo "<div class='mail_time'>";
                                echo $row['time'];
                        echo "</div>";
                        echo "<div class='mail_content'>";
                                echo $row['content'];
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            </div>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>