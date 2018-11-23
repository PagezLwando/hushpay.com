<!DOCTYPE html>
<html lang="en">
<head>
  <title>Items List | Hush Pay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/favicon.ico"/>
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
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
            <li ><a href="login.jsp">Login</a></li>
            <li ><a href="register.jsp">Register</a></li>
            <li class="drop"><a href="#Account">Account</a></li>
            <li class="drop"><a href="#pricing" data-toggle="tooltip" title="Your Wishlist!">
                <button class="btn btn-success btn-sm" type="button">
                    <span id="wishlist" class="glyphicon glyphicon-heart"> 0 </span>
                </button>
                </a>
            </li>
                <li class="drop"><a href="#contact" data-toggle="tooltip" title="Your Cart!">
                <button class="btn btn-danger  btn-sm" type="button">
                        <span class="glyphicon glyphicon-shopping-cart"> 0 </span>
                </button>
                    </a>
                </li>

                <li class="drop"><a href="welcome.jsp" data-toggle="tooltip" title="Go back Home">
                <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="drop"><a href="index.jsp" data-toggle="tooltip" title="Log Out">
                <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                </li>
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
    
    <hr>
      <!-- Footer -->
     <footer class="footer container-fluid text-center"">
      <a href="#myPage" title="To Top">
        <span class="roundchervon glyphicon glyphicon-chevron-up"></span>
      </a>
      <div align="left">
        <span class="w3-left" align="left">Developed by <a href="https://nodumeholdings.000webhostapp.com" target="_blank">NodumeLwando.inc</a></span>
          <br>
          <span align="left">Nodume Technologies &copy Copyright 2018.</span><br>
          <span><a href="#">Privacy Policy</a> | <a href="#">Terms of use</a></span>
      </div>
    <div align="right">
      <a href="#"><span class="fa fa-twitter-square" style="font-size:24px;"></span></a>
          <a href="#"><span class="fa fa-facebook-square" style="font-size:24px"></span></a>
          <a href="#"><span class="fa fa-pinterest-square" style="font-size:24px"></span></a>
          <a href=""><span class="fa fa-youtube-square" style="font-size:24px"></span></a>
          <a href="#"><span class="fa fa-instagram" style="font-size:24px"></span></a>
    </div>
  </footer>
</body>
</html>