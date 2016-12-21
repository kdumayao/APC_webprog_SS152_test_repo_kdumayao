<?php
include_once 'dbconfig.php';
// define variables and set to empty values
$Err = $fnameErr = $lnameErr = $emailErr = $genderErr = $homeaddErr = "";
$fname = $lname  = $email = $gender = $comment = $homeadd =  "";
if(isset($_POST['submit'])){
    $fname = test_input($_POST["fname"]);
    // check if fname only contains letters and numbers
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $fname)) {
      $fnameErr = "Only letters and numbers allowed"; 
      $Err = "Err";
    }
  
    $lname = test_input($_POST["lname"]);
    // check if lname only contains letters and numbers
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $lname)) {
      $lnameErr = "Only letters and numbers allowed"; 
      $Err = "Err";
    }
  
   
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      $Err = "Err";
    }

    $homeadd = test_input($_POST["homeadd"]);
    // check if homeAdd only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$homeadd)) {
      $homeaddErr = "Only letters and white space allowed";
      $Err = "Err"; 
    }
    if (empty($_POST["gender"])) {   
      $genderErr = "Input gender";  
      $Err = "Err";    
    } else {    
      $gender = test_input($_POST["gender"]);   
    }
  
    
    if (empty($_POST["comment"])) {    
      $comment = "";    
    } else {    
      $comment = test_input($_POST["comment"]);   
    }
    if($Err != "Err"){
      $sql_query = "INSERT INTO users(fname, lname, email, homeadd, gender, comment) VALUES('$fname','$lname', '$email','$homeadd','$gender', '$comment')";
      mysqli_query($con,$sql_query)
                ?>
                <script type="text/javascript">
                alert('Data input succesful');
                window.location.href='index.php';
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                alert('error occured while inputting data');
                </script>
                <?php
            }
    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations With PHP and MySql - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>


<div id="body">
 <div id="content">
      <form method="post">  
      <table align = "center">
        <tr align="center">
          <td><a href = "index.php"> Back to Main Page </a></td>
        </tr>

        <tr>
          <td>
            <input type="text" name="fname" placeholder= "First Name" value="<?php echo $fname;?>" required>
            <span class="error">* <br><?php echo $fnameErr;?></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required>
            <span class="error">* <br><?php echo $lnameErr;?></span>
          </td>
        </tr>
        
        
        <tr>
          <td>
            <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>" required>
            <span class="error">* <br><?php echo $emailErr;?></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="homeadd" placeholder="Home Address" value="<?php echo $homeadd;?>">
            <span class="error"><?php echo $homeaddErr;?></span>
          </td>
        </tr>

        <tr>
          <td>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female" required> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male"> Male 
            <span class="error">* <br><?php echo $genderErr;?></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <textarea name="comment" placeholder="Comment" rows="5" cols="40" value="<?php echo $comment;?>"> </textarea>
          </td>
        </tr>
        
        <td>
          <p><span class="error">* required field </span></p>
          <button type="submit" name="submit" value="Submit"> SUBMIT </button>
        </td>
      </table>
    </form>
    </div>
</div>

</center>
</body>