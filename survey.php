<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page1.css">
    <style>
    .error {color: #FF0000;}
    .
    </style>    
</head>
<body>



<?php
// define variables and set to empty values
$nameErr = $emailErr = $mobileErr = $addressErr = $genderErr = $ageErr = $surveyq1Err = 
$surveyq2Err = $surveyq3Err = $surveyq4Err = $surveyq5Err = $surveyq6Err = $surveyq7Err = $surveyq8Err = "";

$name = $email = $mobile = $address = $gender = $age = $surveyq1 = 
$surveyq2 = $surveyq3 = $surveyq4 = $surveyq5 = $surveyq6 = $surveyq7 = $surveyq8 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
 
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["mobile"])) {
    $mobileErr = " Mobile Number is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["age"])) {
    $ageErr = "";
  } else {
    $age = test_input($_POST["age"]);
  }

  if (empty($_POST["surveyq1"])) {
    $surveyq1Err = "";
  } else {
    $surveyq1 = test_input($_POST["surveyq1"]);
  }

  if (empty($_POST["surveyq2"])) {
    $surveyq2Err = "";
  } else {
    $surveyq2 = test_input($_POST["surveyq2"]);
  }

  if (empty($_POST["surveyq3"])) {
    $surveyq3Err = "";
  } else {
    $surveyq3 = test_input($_POST["surveyq3"]);
  }

  if (empty($_POST["surveyq4"])) {
    $surveyq4Err = "";
  } else {
    $surveyq4 = test_input($_POST["surveyq4"]);
  }

  if (empty($_POST["surveyq5"])) {
    $surveyq5Err = "";
  } else {
    $surveyq5 = test_input($_POST["surveyq5"]);
  }

  if (empty($_POST["surveyq6"])) {
    $surveyq6Err = "";
  } else {
    $surveyq6 = test_input($_POST["surveyq6"]);
  }

  if (empty($_POST["surveyq7"])) {
    $surveyq7Err = "";
  } else {
    $surveyq7 = test_input($_POST["surveyq7"]);
  }

  if (empty($_POST["surveyq8"])) {
    $surveyq8Err = "";
  } else {
    $surveyq8 = test_input($_POST["surveyq8"]);
  }
  
  if (empty($_POST["data"])) {
    header("Location: submit.php");
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

                  <!-- ------------------SURVEY FORM---------------------------- -->

<div id="outside">
<form id="survey-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <h1 id="title">Survey form for Smart Bed</h1>
  <p><span class="error">* required field</span></p>
  <p id="description"><b>Note:</b> Your response would be strictly considered for research purposes only.</p>
  
  <!-- ------------------Personal Details---------------------------- -->
  <fieldset>
    <!-- groups of widgets that share the same purpose, for styling and semantic purposes -->
    <legend>Personal Details</legend>
    <!-- formally describes the purpose of the fieldset it is included inside. -->
    <div>
      <label id="name-label" for="name">Full Name:</label>
      <input type="text" name="name" size= 30px placeholder="Enter name here" value="<?php echo $name;?>" required>
      <span class="error">* <?php echo $nameErr;?></span>
    </div>
    <div>
      <label id="email-label" for="Email">Email ID:</label>
      <input type="email" required id="email" name="email" size=30px placeholder="Enter email here" value="<?php echo $email;?>" required>
      <span class="error">* <?php echo $emailErr;?></span>  
    </div>
    <div>
      <label id="phone-label" for="mobile">Contact No:</label>
      <input type="tel" name="mobile" placeholder="Enter 10 digit number" pattern="[+91][0-9]{10,14}" value="<?php echo $mobile;?>" required>
      <span class="error">* <?php echo $mobileErr;?></span>
      <span>(Add +91)</span>  
    </div>

    <div>
      <label for="address-label">Residential Address:</label>
      <input type="text" id="address" name="address" size=70px placeholder="Enter address here" value="<?php echo $address;?>" required>
      <span class="error">* <?php echo $addressErr;?></span>  
    </div>  

    <!-- ------------------Radio Buttons-------------------------------- -->
    <div>
      <label for="gender">Gender</label>
      <p>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other
        <span class="error">* <?php echo $genderErr;?></span>
      </p>
    </div>
    <div>
      <label id="age-label" for="age">Age:</label>
      <input type="number" name="age" min="6" max="150"  value="<?php echo $age;?>" required>
      <span class="error">* <?php echo $ageErr;?></span>
    </div>
  </fieldset>
  <!-- --------------------Text Areas------------------------------ -->
  
  <fieldset>
    <legend>Survey Questions</legend>
    <div>
      <label for="msg"></label>
      <p>How should a smart bed for hospital patients be? Fully automatic or semiautomatic ?</p>
      <textarea id="msg" name="surveyq1" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq1;?>
      </textarea>
      <span class="error">* <?php echo $surveyq1Err;?></span>   
    </div>
    <div>
      <label for="msg">Should the smart bed be designed in such a way that it can automatically connect with a medical device ?</label><br>
      <textarea id="msg2" name="surveyq2" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq2;?>
      </textarea>  
      <span class="error">* <?php echo $surveyq2Err;?></span> 
    </div>
    <div>
      <label for="msg"></label>
      <p>What according to you should be the price of such a bed ? </p>
      <textarea id="msg" name="surveyq3" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq3;?>
      </textarea>
      <span class="error">* <?php echo $surveyq3Err;?></span>   
    </div>
    <div>
      <label for="msg"></label>
      <p>Will it be feasible for patients to rent this bed ? </p>
      <textarea id="msg" name="surveyq4" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq4;?>
      </textarea>
      <span class="error">* <?php echo $surveyq4Err;?></span>   
    </div>
    <div>
      <label for="msg"></label>
      <p>What do you think about the maintenance of such a bed? Will it be cost effective ?</p>
      <textarea id="msg" name="surveyq5" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq5;?>
      </textarea>
      <span class="error">* <?php echo $surveyq5Err;?></span>   
    </div>
    <div>
      <label for="msg"></label>
      <p>What things should be focused upon to make this bed comfortable ?</p>
      <textarea id="msg" name="surveyq6" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq6;?>
      </textarea>
      <span class="error">* <?php echo $surveyq6Err;?></span>   
    </div>
    <div>
      <label for="msg"></label>
      <p>How accessible and easy to operate these smart beds must be according to you ? </p>
      <textarea id="msg" name="surveyq7" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq7;?>
      </textarea>
      <span class="error">* <?php echo $surveyq7Err;?></span>   
    </div>
    <div>
      <label for="msg"></label>
      <p>What are the specific amenities for a smart bed made for patients be according to you ?</p>
      <textarea id="msg" name="surveyq8" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $surveyq8;?>
      </textarea>
      <span class="error">* <?php echo $surveyq8Err;?></span>   
    </div>

  </fieldset>

  <div id="submitbutton">
    <button type="submit" name="submit" value="submit">Submit</button>   </div><br>

    
    <h6>Never submit passwords through forms.</h6>
</form>


    <!-- --------------------Contact Us------------------------------ -->

  <div id="outside">
    <form id="survey-form">
      <h5 style="color:blue;">Contact Us :-</h5>
      <h6><p style="color:#DAA520;">Thakur College Of Engineering And Technology.<br>
A-Block, Thakur Educational Campus, Shyamnarayan Thakur Marg,<br>Thakur Village, Kandivali(E). Mumbai - 400101.<br>
Tel: 022 - 28461891 / 022 - 67308000, 67308106 / 07<br>
Fax: 022 - 28461890<br>
E-Mail:  tcet@thakureducation.org<br>
Websites: www.tcetmumbai.in, www.thakureducation.org</p></h6>
  </div>


</div>

<?php



$query="INSERT INTO survey VALUES ('$name','$email','$mobile','$address','$gender','$age','$surveyq1', 
'$surveyq2','$surveyq3','$surveyq4','$surveyq5','$surveyq6','$surveyq7','$surveyq8')";

$data=mysqli_query($conn,$query);
 
if($data)
{
  //echo "Data inserted into Database";
}
else
{
  echo " Failed to insert Data into Database";

}
?>

</body>
</html>

 