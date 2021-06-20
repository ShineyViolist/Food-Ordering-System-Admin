<html>
<head>
<link rel = "stylesheet" href = "styles/stylesheet.css"/>
<head>
<body>
<?php
    include("./partials/connect.php");
    $ID = $_GET["id"];
    $sql = "SELECT * FROM `tbl_admin` WHERE `ID` = $ID";
    $query = mysqli_query($connect,$sql) or die(mysqli_error());
    if($query){
        $count = mysqli_num_rows($query);
        if($count == 1){
            $result = mysqli_fetch_assoc($query);
            $Username = $result["Username"];
            $Name = $result["Name"];
        }
    }


    echo '<div class = "mainContent">
            <div class = "wrapper">
                <h1>Update Admin</h1>
                <form action = "" method = "POST">
                    <table class = "adminTbl">
                        <tr>
                            <td>Name</td>
                            <td><input type = "text" name = "name" placeholder = ' .$Name.' /></td>
                        </tr>

                        <tr>
                            <td>Username</td>
                            <td><input type = "text" name = "username" placeholder = ' .$Username. ' /></td>
                        </tr>

                        <tr>
                            <td colspan = "2">
                                <input type = "submit" name = "updateButton" value = "Submit" class = "submitButton"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>';

        if(isset($_POST["updateButton"])){
            $name2 = $_POST["name"];
            //echo $name2;
            echo "<br>";
            $username2 = $_POST["username"];
            $sql2 = "UPDATE `tbl_admin` SET `Name`='$name2',`Username`='$username2' WHERE `ID` = '$ID'";
            //echo $sql2;
            echo "<br>";
            $query2 = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
            echo "<br>";
            if($query2 == TRUE){
                $_SESSION["update"] = "<div class = 'success_message'> Admin updated successfully </div>";
                header("Location:".SITE_URL);
            }else{
                $_SESSION["update"] = "<div class = 'failure_message'> Admin update was a failure </div>";
            }
        }
    ?>
</body>
</html>