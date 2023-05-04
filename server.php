<?php
	session_start();		
	$errors = array();
	//connect to the database;
	//$db = mysqli_connect('localhost','root','','registration');
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=facultemedecine','root','');
	//$bdd = new PDO("mysql:host=localhost;dbname=facmedfi_facultedemedecine;","facmedfi_facultedemedecine",'facmed2020++') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++Theodore $$ Ando ==>ENI+++++++++++++++++++++++++++++++++++++++++++++++++*/
?>