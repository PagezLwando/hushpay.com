<?php
  //index.php
  include ('db/connection.php');
  if (!isset($_SESSION["id"])) {
    header("location:login.php");
  }
?>
<?php
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>

<html lang="en">
<head>
  <title>Welcome | Hush Pay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/favicon.ico"/>
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.7/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css" type="text/css" rel="stylesheet" />
  <link href="css/stylescart.css" type="text/css" rel="stylesheet" />

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
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
        <a class="navbar-brand" href="#myPage">@HUSHPAY</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="login.php">Login</a></li>
          <li ><a href="register.php">Register</a></li>
          
          <li class="drop">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Account                    <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Login</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Register</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
                  </ul>
                </div>
          </li>
         
          <a href="welcome.jsp" data-toggle="tooltip" title="Go back Home">
              <span class="glyphicon glyphicon-home"></span>
          </a>
          <a href="index.jsp" data-toggle="tooltip" title="Log Out">
              <span class="glyphicon glyphicon-log-out"></span>
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
    <?php if (isset($_SESSION["emailAddress"])): ?>
        <p style="color: black;">Welcome <strong><?php echo $_SESSION["firstName"]; ?></strong></p>
      <?php endif ?>
  </div>
    <!-- Container (Shooping Section) -->
        <div class="column side" id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>
        <a id="btnEmpty" href="welcome.php?action=empty">Empty Cart</a>
        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
        ?>  
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Code</th>
        <th style="text-align:right;" width="5%">Quantity</th>
        <th style="text-align:right;" width="10%">Unit Price</th>
        <th style="text-align:right;" width="10%">Price</th>
        <th style="text-align:center;" width="5%">Remove</th>
        </tr> 
        <?php   
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
            ?>
            <tr>
            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
            <td><?php echo $item["code"]; ?></td>
            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
            <td style="text-align:center;"><a href="welcome.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
            </tr>
            <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>

        <tr>
        <td colspan="2" align="right">Total:</td>
        <td align="right"><?php echo $total_quantity; ?></td>
        <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
        <td></td>
        </tr>
        </tbody>
        </table>    
          <?php
        } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php 
        }
        ?>
        </div>

        <div id="product-grid">
          <div class="txt-heading">Products</div>
          <?php
          $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
          if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
          ?>
            <div class="product-item">
              <form method="post" action="welcome.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
              <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
              <div class="product-tile-footer">
              <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
              <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
              <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
              </div>
              </form>
            </div>
          <?php
            }
          }
          ?>
        </div>
</body>
</html>