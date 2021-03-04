<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = pg_connect("ec2-54-225-190-241.compute-1.amazonaws.com dbname=dd4i93hh9ooitm user=wmwkvvsucgfftw password=4255f55c61b88e10d836bdabbefdf41db3cbaa7dcdccd6447d85c2dfd2e9d8d4");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$cat = mysqli_real_escape_string($link, $_REQUEST['cat']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);

 
// Attempt insert query execution
$sql = "INSERT INTO Product (Id, Product_Name, Category, Date, Price, Descriptions) VALUES ('$id', '$name', '$cat','$date','$price','$description')";
if(pg_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}
 
// Close connection
pg_close($link);
?>