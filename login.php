<?php
  //login.php
  include ('db/connection.php');
  $message = '';
  if (isset($_POST["login"]))
  {
    if (empty($_POST["emailAddress"]) || empty($_POST["password"]))
    {
      $message = '<label> Both fields are required </label>';
    }
    else
    {
      $query = "SELECT * FROM user WHERE emailAddress = :emailAddress";
      $statement = $connect->prepare($query);
      $statement->execute(array('emailAddress' => $_POST["emailAddress"]));
      $count = $statement->rowCount();
      if ($count > 0)
      {
        $results = $statement->fetchAll();
        foreach ($results as $row)
        {
          if ($_POST['password'] == $row['password'])
          {
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstName'] = $row['firstName'];
            header("location: welcome.php");
            //echo $message = "lwando";
          }
          else
          {
            $message = '<label>Wrong Email Address or password</label>';
          }
        }
      }
      else
      {
        $message = '<label>Wrong Email Address or password</label>';
      }
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login | Hush Pay</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="shortcut icon" href="images/favicon.gif">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                   
        </button>
        <a class="navbar-brand" href="#myPage">#LOGO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="login.php">Login</a></li> 
          <li ><a href="register.php">Register</a></li>
          <li class="drop"><a href="#Account">Account</a></li>
          <a href="#pricing" data-toggle="tooltip" title="Your Wishlist!">
            <button class="btn btn-success btn-sm" type="button">
              <span id="wishlist" class="glyphicon glyphicon-heart"> 0 </span>
            </button>
          </a>
          <a href="#contact" data-toggle="tooltip" title="Your Cart!">
            <button class="btn btn-danger  btn-sm" type="button">
              <span class="glyphicon glyphicon-shopping-cart"> 0 </span>
            </button>
          </a>
          <a href="index.php" data-toggle="tooltip" title="Go back Home">
            <span class="glyphicon glyphicon-home"></span>
          </a>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Jumbotron -->    
  <div class="jumbotron text-center"> 
    <form action="#" method="post" class="form-inline">
      <select class="form-control">
        <option name="--Select--">Filter By Department</option>
        <option name="OfficeAndStationery">Office & Stationery</option>
        <option name="HomeAndKitchen">Home &AMP; Kitchen</option>
        <option name="HealthAndBeauty">Health &AMP; Beauty</option>
        <option name="BabyAndToddler">Baby &AMP; Toddler</option>
        <option name="MoviesAndSeries">Movies &AMP; Series</option>
        <option name="FrozenFood">Frozen Food</option>
        <option name="LiquorAndDrinks">Liquor &AMP; Cool Drinks</option>
      </select>
      <input type="text" class="form-control" size="50" placeholder="Search..." required>
      <a href="#"><button type="button" class="btn btn-default glyphicon glyphicon-search"></button></a>
    </form>
  </div>
  <hr>
  <div class="container" id="container_demo">
    <section>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
	    <div class="panel panel-default">
        <div class="panel-heading" id="wrapper">
          <div class="row">
            <div class="col-md-6" align="center">
			        <b><a href="login.jsp" >Administrator only</a></b>
            </div>
            <div class="col-md-6" align="center">
              <b><a href="login.jsp">Users only</a></b>
            </div>
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
          </div>
        </div>
        <div class="panel-body">
          <form method="POST" autocomplete="off">
            <span class="text-danger"><?php echo $message; ?></span>
            <div class="form-group">
              <label>User email</label>
              <input type="text" name="emailAddress" value="" placeholder="Email" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" value="" placeholder="Password" id="password" class="form-control" />
            </div>
            <div class="form-group">
              <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
              <input type="reset" name="reset" id="reset" class="btn btn-default" value="Cancel" />
              <p class="keeplogin"> 
                <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                <label for="loginkeeping">Keep me logged in</label>
              </p>
              <br>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-2"></div>
      </section>
      <br>
      <br>        
      <!-- Footer -->
     <footer class="footer container-fluid text-center"">
      <div class="row">
        <div class="col-md-4">
          <span class="w3-left" align="left">Developed by <a href="https://nodumeholdings.000webhostapp.com" target="_blank">NodumeLwando.inc</a></span>
          <br>
          <span align="left">Nodume Technologies &copy Copyright 2018.</span><br>
          <span><a href="#">Privacy Policy</a> | <a href="#">Terms of use</a></span>
        </div>
        <div class="col-md-4">
          <a href="#myPage" title="To Top">
            <span class="roundchervon glyphicon glyphicon-chevron-up"></span>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <span class="fa fa-twitter-square" style="font-size:24px;"></span>
          </a><br>
            <a href="#">
              <span class="fa fa-facebook-square" style="font-size:24px"></span>
            </a><br>
            <a href="#">
              <span class="fa fa-pinterest-square" style="font-size:24px"></span></a><br>
            <a href="">
              <span class="fa fa-youtube-square" style="font-size:24px"></span>
            </a><br>
            <a href="#">
              <span class="fa fa-instagram" style="font-size:24px"></span>
            </a>
        </div>
      </div>
    </footer>
  </body>
</html>