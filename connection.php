<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "smartbed";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    //echo "Connection OK";
}
else
{
    echo "Connection Failed" .mysqli_connect_error();
}

?>