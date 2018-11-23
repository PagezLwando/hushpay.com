<?php
	//connect.php
	$connect = new PDO("mysql:host=localhost;dbname=hushpaydb", "root", "");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>