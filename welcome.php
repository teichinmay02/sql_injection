<?php
/* Initialize the session */
session_start();
 
/* Check if the user is logged in, if not then redirect him to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "sql_injection";

    $con = mysqli_connect($host, $username, $password) or die("Cannot connect");
    mysqli_select_db($con, $db_name) or die("Cannot select DB");

    $uid = $_POST['uid'];
    $pid = $_POST['passid'];

    $SQL = "SELECT * FROM user_details WHERE userid = '$uid' AND password = '$pid'";
    $result = mysqli_query($con, $SQL);
?>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome</h1>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="span6">
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo 'Personal Information';
                echo '<table class="table table-bordered table-striped table-dark">';
                echo '<thead>';
                echo '<tr>';
                // echo '<th>Personal Information</th>';
                echo '<th scope="col">User ID</th>';
                echo '<th scope="col">Password</th>';
                echo '<th scope="col">First Name</th>';
                echo '<th scope="col">Last Name</th>';
                echo '<th scope="col">Gender</th>';
                echo '<th scope="col">Date of Birth</th>';
                echo '<th scope="col">Country</th>';
                echo '<th scope="col">Email ID</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = mysqli_fetch_row($result)) {
                    echo '<tr>';
                    // echo '<td>welcome ' . $row[2] . ' ' . $row[3] . '</td>';
                    echo '<td>' . $row[0] . '</td>';
                    echo '<td>' . $row[1] . '</td>';
                    echo '<td>' . $row[2] . '</td>';
                    echo '<td>' . $row[3] . '</td>';
                    echo '<td>' . $row[4] . '</td>';
                    echo '<td>' . $row[5] . '</td>';
                    echo '<td>' . $row[6] . '</td>';
                    echo '<td>' . $row[8] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo "Invalid user id or password";
            }
            ?>

            </div>
        </div>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    
    &nbsp;&nbsp;&nbsp;&nbsp;  
    <div id="query_op" style="color:white">
        SELECT <span class="green">*</span><br>FROM <span class="green">users</span><br> where email = '<span class="blue" id="out_user"></span>' <br> AND PASS = '<span class="blue" id="out_pass"></span>' LIMIT 1
    </div> 
        
    &nbsp;&nbsp;&nbsp;&nbsp; 
    <div id="query_op" style="color:white">
        <span id="loadingText" style="display: none;">User authenticated</span>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("loadingText").style.display = "inline";
        }, 1000);
    </script>
</body>
</html>