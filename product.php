<?php
/* Attempt Heroku Postgres connection 
	Assuming you are running Heroku Postgres add-on
	with default setting*/
	$link = pg_connect("ec2-54-225-190-241.compute-1.amazonaws.com dbname=dd4i93hh9ooitm user=wmwkvvsucgfftw password=4255f55c61b88e10d836bdabbefdf41db3cbaa7dcdccd6447d85c2dfd2e9d8d4 sslmode=require"); 
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}
	
	 
	// Escape user inputs for security
	//$id = mysqli_real_escape_string($link, $_REQUEST['id']);
	//$name = mysqli_real_escape_string($link, $_REQUEST['name']);
	//$cat = mysqli_real_escape_string($link, $_REQUEST['cat']);
	//$date = mysqli_real_escape_string($link, $_REQUEST['date']);
	//$price = mysqli_real_escape_string($link, $_REQUEST['price']);
	//$desc = mysqli_real_escape_string($link, $_REQUEST['description']);
	
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$cat = $_REQUEST['cat'];
	$price = $_REQUEST['price'];
	$desc = $_REQUEST['description'];

	echo $id;
	echo $name;
	echo $cat;
	echo $date;
	echo $price;
	echo $desc;

	//$id = "001";
	//$name = "My Product";
	//$cat = "Default";
	//$date = "04-24-2020";
	//$price = "100";
	//$desc = "Default";
	 
	// Attempt insert query execution
	$sql4 = 'INSERT INTO public."product" (
			"id","product_name","category","price","descriptions") VALUES ('."
			'$id'::character varying,'$name'::character varying,'$cat'::character varying,'$price'::integer,'$desc'::character varying)".
			 'returning "id"';
	
	//$sql = "INSERT INTO public.product (id, product_name, category, date, price, descriptions) VALUES			('001','My Product','Default','04/24/2020','100','Default')";
	
	if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . pg_error($link);
	}
	
	// Close connection
	pg_close($link);
?>