<?php
  //login.php
  include ('db/connection.php');
  $message = '';
  if (isset($_POST["signup"]))
  {
    if (empty($_POST["emailAddress"]))
    {
      $message = '<label>Email is required</label>';
    }
    elseif (empty($_POST["password"])) 
    {
      $message = '<label>Password is required</label>';
    }
    else
    {
      $query = "INSERT INTO user (id, firstName, lastName, emailAddress, password, category, gender, phoneNumber) VALUES (:id, :firstName, :lastName, :emailAddress, :password, :category, :gender, :phoneNumber)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
         ':id'  => $_POST['id'],
         ':firstName' => $_POST['firstName'],
         ':lastName' => $_POST['lastName'],
         ':emailAddress' => $_POST['emailAddress'],
         ':password' => $_POST['password'],
         ':category' => $_POST['category'],
         ':gender' => $_POST['gender'],
         ':phoneNumber' => $_POST['phoneNumber'],
      ));

      $results = $statement->fetchAll();
      if (isset($results))
      {
        $_SESSION["id"] = $row['id'];
        $_SESSION["firstName"] = $row['firstName'];
        header("location: welcome.php");
      }
      else
      {
        $message = '<label>Not logged in</label>';
        header("location: login.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Register | Hush Pay</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/responsive.css">
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
            <a class="navbar-brand" href="#myPage">@HUSHPAY</a>
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
          <a href="#">
            <button type="button" class="btn btn-default glyphicon glyphicon-search"></button>
          </a>
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
			           <div class="row"></div>
                </div>
                <div class="panel-body">
                  <form action="register.php" method="POST" autocomplete="on">
                  <span class="text-danger"><?php echo $message; ?></span>
                    <div class="form-group">
                      <label>First name:</label>
                      <input type="text" name="firstName" value="" placeholder="First name:" id="firstname" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Last name:</label>
                      <input type="text" name="lastName" value="" placeholder="Last name:" id="lastname" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>User email</label>
                      <input type="text" name="emailAddress" value="" placeholder="Email Address:" id="email" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" value="" placeholder="Password:" id="Password" class="form-control" />
                    </div>
                    <div>
                      <label>Confirm Password</label>
                      <input type="password" name="passwordC" value="" class="form-control" placeholder="Confirm password:" required  id="password_confirm" oninput="check(this)"/>
                      <script language='javascript' type='text/javascript'>
                        function check(input) {
                          if (input.value !== document.getElementById('password').value){
                                  input.setCustomValidity('Passwords do not Match.');
                                }
                                else{
                                    // input is valid -- reset the error message
                                    input.setCustomValidity('');
                                  }
                                }
                      </script>
                      </div>
                      <br>
                    <div class="form-group">
                      <label>Category:</label>
                      <select name="category" class="form-control">
                        <option value="--select--">Select</option>
                        <option value="Admin">Administrator</option>
                        <option value="User">User</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Gender:</label>
                      <select name="gender" class="form-control">
                        <option value="--select--">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Phone Number:</label>
                      <input type="text" name="phoneNumber" value="" placeholder="Phone Number:" id="firstname" class="form-control" />
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="submit" name="signup" id="signup" class="btn btn-info" value="Sign up" />
                      <input type="reset" name="reset" id="reset" class="btn btn-default" value="Cancel" />
                    </div>
                  </form>
                </div>  
              </div>
            </div>
          <div class="col-md-2"></div>
          </div>
        </section>
        <br>
        <br>
      </div>  
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
          <a href="#"><span class="fa fa-twitter-square" style="font-size:24px;"></span></a><br>
          <a href="#"><span class="fa fa-facebook-square" style="font-size:24px"></span></a><br>
          <a href="#"><span class="fa fa-pinterest-square" style="font-size:24px"></span></a><br>
          <a href=""><span class="fa fa-youtube-square" style="font-size:24px"></span></a><br>
          <a href="#"><span class="fa fa-instagram" style="font-size:24px"></span></a>
        </div>
      </div>
    </footer>
  </body>
</html>
