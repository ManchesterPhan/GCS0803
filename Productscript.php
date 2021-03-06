<html>
    <body>
        <p>You have submitted the followings to the server:</p>
            Your name: <?php echo $_POST["name"];?> <br>
            Your email: <?php echo $_POST["email"];?> <br>
            <?php
	$host = "ec2-54-225-190-241.compute-1.amazonaws.com";
	$dbname = "dd4i93hh9ooitm";
	$port = "5432";
	$user = "wmwkvvsucgfftw";
	$pass = "4255f55c61b88e10d836bdabbefdf41db3cbaa7dcdccd6447d85c2dfd2e9d8d4";
	$ssl = "require";	

	$link = pg_connect("host=".$host." dbname=".$dbname." port=".$port." user=".$user." password=".$pass." sslmode=".$ssl);

// Check connection
	if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}


	$id = $_REQUEST["id"];
	$name = $_REQUEST["productname"];
	$cat = $_REQUEST["category"];
	$price = $_REQUEST["price"];
	$desc = $_REQUEST["descriptions"];

	echo $id;
	echo $name;
	echo $cat;
	echo $price;
	echo $desc;

	$sql = 'INSERT INTO public."product" (
			"id","product_name","category","price","descriptions") VALUES ('."
			'$id'::character varying,'$name'::character varying,'$cat'::character varying,'$price'::integer,'$desc'::character varying)".
			 'returning "id"';

	echo $sql;
	
		if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . pg_error($link);
	}


	?>
    </body>
</html>