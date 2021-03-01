<html>
    <body>
        <p>You have submitted the followings to the server:</p>
            Your name: <?php echo $_POST["name"];?> <br?>
            Your email: <?php echo_POST["email"];?> <br>
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

	?>
    </body>
</html>