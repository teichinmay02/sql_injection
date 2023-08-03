<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SQL Injection form error example</title>
    
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--<link href="http://twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">-->
    <style type="text/css">
      

        :invalid {
            border-color: #e88;
            -webkit-box-shadow: 0 0 5px rgba(255, 0, 0, .8);
            -moz-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
            -o-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
            -ms-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
            box-shadow: 0 0 5px rgba(255, 0, 0, .8);
        }

        :required {
            border-color: #88a;
            -webkit-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
            -moz-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
            -o-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
            -ms-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
            box-shadow: 0 0 5px rgba(0, 0, 255, .5);
        }

        form {
            width: 300px;
            margin: 20px auto;
        }

        .custom-cursor {
            cursor: url('assets/custom-cursor.png'), auto;
        }
    </style>
    <script>
        window.onload = function() {
            // Get the input elements
            var usernameInput = document.getElementById('uid');
            var passInput = document.getElementById('passid');
            var outputParagraph1 = document.getElementById('out_user');
            var outputParagraph2 = document.getElementById('out_pass');
            
            // Add an input event listener to the username input
            usernameInput.addEventListener('input', function() {
                // Set the content of the output paragraph to the username value
                outputParagraph1.textContent = usernameInput.value;
            });
            
            passInput.addEventListener('input', function() {
                // Set the content of the output paragraph to the username value
                outputParagraph2.textContent = passInput.value;
            });
        };
        
    </script>
</head>

<body class="custom-cursor">
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <form action="action.php" method="POST">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">username</span>
        </div>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" id="uid" name="uid">
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">password</span>
        </div>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="password" id="passid" name="passid" required>
    </div>
        <center><button type="submit" value="Submit" class="btn btn-primary">submit</button></center>
    </form>
    <center>
    &nbsp;&nbsp;&nbsp;&nbsp;  
    <div id="query_op" style="color:white">
        SELECT <span class="green">*</span><br>FROM <span class="green">users</span><br> where userid = '<span class="blue" id="out_user"></span>' <br> AND PASS = '<span class="blue" id="out_pass"></span>' LIMIT 1
    </div> 
    &nbsp;&nbsp;&nbsp;&nbsp; 
    <div id="query_op" style="color:white">
        <span id="loadingText" style="display: none;">page rendered... <br> enter details</span>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("loadingText").style.display = "inline";
        }, 1000);
    </script>
    </center>
</body>
<script>
    const cursor = document.querySelector('.custom-cursor');

// Update the cursor position on mousemove
document.addEventListener('mousemove', (e) => {
cursor.style.left = `${e.clientX}px`;
cursor.style.top = `${e.clientY}px`;
});

// Add event listeners to elements you want to change the cursor for
const elementsWithCustomCursor = document.querySelectorAll('.change-cursor');
elementsWithCustomCursor.forEach((element) => {
element.addEventListener('mouseover', () => {
    cursor.classList.add('custom-cursor-hover');
});

element.addEventListener('mouseout', () => {
    cursor.classList.remove('custom-cursor-hover');
});
});
</script>
</html>