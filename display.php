<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page1.css">

    <style>
        body {
 background-image: url("https://image.shutterstock.com/image-photo/light-color-abstract-background-created-260nw-1564029013.jpg");
 background-repeat: no-repeat;
 background-size: 100%;
}
h1 {
  font-size: 12px;
}
</style>    
</head>
<body>
<h2><b>Records of Smart Hospital Beds SurveyForm</b></h2>
<h1>
<table border="1">   
<tr>
<th>Name</th>
<th>E-mail</th>
<th>Mobile Number</th>
<th>Address</th>
<th>Gender</th>
<th>Age</th>
<th>Survey.Q1</th>
<th>Survey.Q2</th>
<th>Survey.Q3</th>
<th>Survey.Q4</th>
<th>Survey.Q5</th>
<th>Survey.Q6</th>
<th>Survey.Q7</th>
<th>Survey.Q8</th>
<?php
error_reporting(0);
include("connection.php");
$query = "SELECT * FROM survey";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0){

    
    while(($result=mysqli_fetch_assoc($data)))
    {
        echo "
        <tr>
        <td>".$result['name']."</td>
        <td>".$result['email']."</td>
        <td>".$result['mobile']."</td>
        <td>".$result['address']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['age']."</td>
        <td>".$result['surveyq1']."</td>
        <td>".$result['surveyq2']."</td>
        <td>".$result['surveyq3']."</td>
        <td>".$result['surveyq4']."</td>
        <td>".$result['surveyq5']."</td>
        <td>".$result['surveyq6']."</td>
        <td>".$result['surveyq7']."</td>
        <td>".$result['surveyq8']."</td>
        </tr>
        ";
    }
    
}
else{
    echo "no record found";
}

?>
</table>
</h1>
</body>
</html>