<!doctype html>
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
    <meta charset="utf-8">
    <title>SQL Injection form error example</title>
    <link href="http://localhost/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>
    
      h1{
        color: #32a852;
        }
        .mode {
            float:right;
        }
        .change {
            cursor: pointer;
            border: 1px solid #555;
            border-radius: 40%;
            width: 20px;
            text-align: center;
            padding: 5px;
            margin-left: 8px;
        }
        .dark{
            background-color: #222;
            color: #e6e6e6;
        }
</style>

<body style="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"> <br> SQL Injection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <div class="mode">
            Dark mode:            
            <span class="change">OFF</span>
        </div>
        </div>
      </nav>
<marquee behavior="" direction="">welcome to portal</marquee>

    <div class="container">
        <div class="row">
            <div class="span6">
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo '<br><br>Personal Information';
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
</body>
<script>
       $( ".change" ).on("click", function() {
            if( $( "body" ).hasClass( "dark" )) {
                $( "body" ).removeClass( "dark" );
                $( ".change" ).text( "OFF" );
            } else {
                $( "body" ).addClass( "dark" );
                $( ".change" ).text( "ON" );
            }
        });
</script>

</html>