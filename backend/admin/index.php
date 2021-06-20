<html>
    <head>
        <title>Food Ordering Stytem - Homepage</title>
        <link rel = "stylesheet" href = "styles/stylesheet.css"/>
    </head>
    <body>    
        <?php
            include("./partials/navbar.php");
        ?>
        <div class = "mainContent">
        <h1>
            Admin Page
        </h1>
        <br>
        <br>
        <br>
        <a href = './addAdmin.php' class = "b-primary">Add Admin</a>
        <br>
        <br>
        <br>
        <?php
            if(isset($_SESSION["add"])){
                echo $_SESSION["add"];
                unset($_SESSION["add"]);
            }

            if(isset($_SESSION["delete"])){
                echo $_SESSION["delete"];
                unset($_SESSION["delete"]);
            }

            if(isset($_SESSION["update"])){
                echo $_SESSION["update"];
                unset($_SESSION["update"]);
            }
        ?>
        <table class = "adminTbl">
            <tr>
                <th>sNo.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `tbl_admin`  ";
                $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                $count = mysqli_num_rows($query);
                while($rows = mysqli_fetch_assoc($query)){
                    //$rows['Name' ... etc]
                    echo 
                    '<tr>
                        <td>'.$rows['ID'].'</td>
                        <td>'.$rows['Name'].'</td>
                        <td>'.$rows['Username'].'</td>
                        <td><a href = "./updateAdmin.php?id= '.$rows["ID"].'" class = "bUpdate">Update</a> <a href = "./deleteAdmin.php?id= '.$rows["ID"].'" class = "bDelete">Delete</a></td>
                    </tr>';
                }
            ?>
        </table>
        <div>
        <?php
            include("./partials/footer.php");
        ?>
    </body>
</html>