<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Hush Pay</title>
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
<style>
    .product{
    padding-bottom: 40px;
}
</style>
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
    
    <div class="row">
    <!-- Container (Nav Section) -->
     <div class=" col-md-2">
       <ul class="sideNv ">
        <li class="fix"><a href="about.php">About Us</a></li>
        <li class="fix"><a href="instructions.php">Instructions</a></li>
        <br>
        <li class="fix"><a href="order.php">Make Grocery</a></li><br>
        <li class="fix"><a href="payments.php">Budget Your Grocery</a></li><br>
        <br>
        <li class="fix"><a href="settings.php">Settings</a></li><br>
        <li class="fix"><a href="checkout.php">Make an order</a></li><br>
        </ul>
     </div>
    <div class="col-md-10">
            <div class="col-sm-4 product">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="images/presto.jpg" style="width: 100%;" alt="Card image cap">
                    <div class="card-body">
                      <c:forEach items="${lists}" var="Items">
                          ${Items.toString()}
                      </c:forEach>
                      <p class="price"></p>
                      <p class="card-text">Description</p>
                      <a href="#" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                      <a href="#" class="btn btn-success btn-block"><span class="glyphicon glyphicon-heart-empty"></span></a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
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