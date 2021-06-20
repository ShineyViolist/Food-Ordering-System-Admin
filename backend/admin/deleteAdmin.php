<?php
    include ("./partials/connect.php");
    $id = $_GET["id"];
    $sql = "DELETE FROM `tbl_admin` WHERE `ID` = $id";
    $query = mysqli_query($connect,$sql) or die(mysqli_error());
    if($query== true){
        $_SESSION["delete"] = "<div class = 'success_message'> Admin has been removed </div>";
        header("location:".SITE_URL);
    }else{
        $_SESSION["delete"] = "<div class = 'failure_message'> Admin deletion has failed, please try again </div>";

    }
?>