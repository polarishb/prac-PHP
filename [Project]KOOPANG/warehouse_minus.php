<?php
    $con = mysqli_connect("write-db.koopang.com", "admin", "P@ssw0rd", "webDB");

    $id = $_POST["id"];
    $quantity = $_POST["quantity"];

    if($quantity > 0){
        $sql = "update warehouse set quantity = $quantity - 1  where item_id = '$id';";
        $ret = mysqli_query($con, $sql);
    } 

    $con = mysqli_close($con);
    echo "<script>location.replace('warehouse.php');</script>";

?>