<!DOCTYPE html>
<html>
    <head>
        <title>비밀번호확인</title>
        <?php
            $id = $_GET["id"];
        ?>
    </head>
    <body>
        <h1>비밀번호확인</h1>
        <form method="post" action="testcheck_ok.php">
            ID : <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
            비밀번호 : <input type="password" name="passwd">
            <br>
            <input type="submit" value="확인">
        </form>
    </body>
</html>