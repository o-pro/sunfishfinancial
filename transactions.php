




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico">
    <title>Transactions</title>

    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      * {
          transition: 0s;
      }
      body {
        background-image: url("background.jpeg");
        background-repeat: no-repeat;
      }
      .dropdown-menu {
        position: relative;
        border: none;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        margin-top: 15px;
      }
      .dropdown-item:hover {
         background-color: transparent;
         color: #ffffffff;
      }
      .nav-item:hover {
        color: #ffffffff;
      }
      .imgbox {
          margin-top: 96px;
          text-align: center;
      }
      .center-fit {
          max-width: 100%;
          min-width: 100%;
          height: auto;
          margin: auto;
      }
      .darklight {
        /*background-color: #000000B6;
                            R G B A*/
        background-color: #FFFFFFB6;
      }
      .shadowhead {
        text-shadow: 4px 4px #000000ff;
      }
      .shadowtext {
        text-shadow: 3px 3px #000000ff;
      }
      .header1 {
        color: white;
        font-size: 6vw;
        position: absolute;
        top: 34%;
        right: 8%;
      }
      .para1{
        color: white;
        font-size: 3.5vw;
        text-align: right;
        position: absolute;
        top: 45%;
        right: 8%;
      }
    </style>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top darklight">
      <a class="navbar-brand" href="index.html" aria-label="Sunfish";>
          <img class="d-inline-block align-top" src="sunfish.svg" width=auto height="48px" alt="Sunfish" id="SunfishIcon">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-item nav-link ml-2 mr-2" style="color: #000000FF; font-size: 32px; white-space: nowrap;" href="transactions.html"><b>Transactions</b></a>
            </li>
          </ul>
      </div>
  </nav>



  <main role="main" class="container-fluid m-0 p-0">
      <div class="imgbox">
        <h1>Transactions:</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "deathlyhollows";
$database = 'financial';

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$value = $_GET["value"];
$table = $_GET["table"];
$field = $_GET["field"];
$sql = "SELECT * FROM $table WHERE $field LIKE $value;";



if ($mysqli -> multi_query($sql)) {
  do {
    // Store first result set
    if ($result = $mysqli -> store_result()) {
      while ($row = $result -> fetch_row()) {
        echo "<p>" . implode(" ",$row) . "</p>";
      }
     $result -> free_result();
    }
    // if there are more result-sets, the print a divider
    if ($mysqli -> more_results()) {
      printf("-------------\n");
    }
     //Prepare next result set
  } while ($mysqli -> next_result());
}

// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo implode(" ",$row);
//   }
// } else {
//   echo "0 results";
// }
$mysqli->close();
?>
</div>
</main><!-- /.container -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
