<html>
    <head>
        <link rel = "stylesheet" href = "styles/stylesheet.css"/>
    </head>
    <body>
        <?php
            define('SITE_URL','http://localhost/Food%20Ordering%20System/backend/admin/index.php');
            $connect = mysqli_connect("localhost","root", "") or die(mysqli_error($connect));
            $db_select = mysqli_select_db($connect,"food_ordering_system");
            
        ?>
        <div class = "mainContent">
        <div class = "wrapper">
        <form method = "POST" action = "">
            <h1>Login Page</h1>
            <table class = "adminTbl">
                <tr>
                    <td>Username</td>
                    <td><input type = "text" placeholder = "Username goes here" name = "UsernameInput"/></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type = "password" placeholder = "Password goes here" name = "PasswordInput"/></td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type = "submit" name = "SubmitInput" value = "Submit" class = "submitButton"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>

        <?php
            /*if(!isset($_SESSION["logged_in"])){
                $_SESSION["logged_in"] = "false";
                echo "hello".$_SESSION["logged_in"];
            }*/
            /*if($_SESSION["logged_in"] == "true"){
                echo "login is true";
                header("Location:".SITE_URL);
            }*/
            if(isset($_POST["SubmitInput"])){
                $username = $_POST["UsernameInput"];
                $password = $_POST["PasswordInput"];
                
                
                $sql = "SELECT * FROM `tbl_admin` WHERE `Username` = '$username' AND `Password` = '$password'";
                echo $sql;
                $query = mysqli_query($connect,$sql) or die(mysqli_error());
                $rows = mysqli_fetch_assoc($query);
                if(mysqli_num_rows($query) > 0){
                    echo $_POST["SubmitInput"];
                    $_SESSION["user1"] = $username;
                    $_SESSION["logged_in"] = "true";
                    //unset($_POST["SubmitInput"]);
                    //echo $_POST["SubmitInput"];
                    echo $_SESSION["user1"];
                    echo "<br>";
                    print_r($_SESSION);
                    echo "<br>";
                    echo $_SESSION["logged_in"];
                    //header("Location:".SITE_URL);
                    
                }else{
                    echo "<div class = 'failure_message'> Login has failed, please enter the correct credentials </div>";
                    echo $sql;
                    //header("Location:http://localhost/Food%20Ordering%20System/backend/admin/login.php");
                }
            }
        ?>

    </body>
</html>