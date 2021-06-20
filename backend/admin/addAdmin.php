<html>
    <head>
        <title>Food Ordering System - Add Admin</title>
        <link rel = "stylesheet" href = "styles/stylesheet.css"/>
    </head>
    <body>
        <?php
            include("./partials/navbar.php");
        ?>
        <div class = "mainContent">
            <div class = "wrapper">
                <h1>Add Admin</h1>
                <form action = "" method = "POST">
                    <table class = "adminTbl">
                        <tr>
                            <td>Name</td>
                            <td><input type = "text" name = "name" placeholder = "Enter Name here"/></td>
                        </tr>

                        <tr>
                            <td>Username</td>
                            <td><input type = "text" name = "username" placeholder = "Enter Username here"/></td>
                        </tr>

                        <tr>
                            <td>Password</td>
                            <td><input type = "password" name = "password" placeholder = "Enter Password here"/></td>
                        </tr>

                        <tr>
                            <td colspan = "2">
                                <input type = "submit" name = "submitButton" value = "Submit" class = "submitButton"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
            include("./partials/footer.php");
        ?>
    </body>
</html>

<?php
    if(isset($_POST["submitButton"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        //$sql = "INSERT INTO tbl_admin SET Name =".$name.",Username = ".$username.",Password = ".$password;
        //echo $sql;
        //$sql = " INSERT INTO tbl_admin SET Name = '$name' Username = '$username' Password = '$password' ";
        $sql = "INSERT INTO `tbl_admin`(`Name`, `Username`, `Password`) VALUES ('$name','$username','$password')";
        //echo($sql);
        echo "<br>";
        $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        if($query == TRUE){
            $_SESSION["add"] = "<div class = 'success_message'> Admin created successfully </div>";
            header("Location:".SITE_URL);
        }else{
            $_SESSION["add"] = "<div class = 'failure_message'> Admin addition was a failure </div>";
        }


    }
?>