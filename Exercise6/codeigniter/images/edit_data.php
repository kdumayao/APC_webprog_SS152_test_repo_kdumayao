<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id'])){
    $sql_query="SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set);
  }
$Err = $fnameErr = $lnameErr =  $emailErr = $genderErr = $homeaddErr =  "";
if(isset($_POST['btn-update'])){
 // variables for input data
  
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
 // sql query for update data into database
  if($Err != "Err"){
    $sql_query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',homeadd='$homeadd',gender='$gender',comment='$comment' WHERE user_id=".$_GET['edit_id'];
 if(mysqli_query($con,$sql_query))
      {
      ?>
        <script type="text/javascript">
        alert('Data Are Updated Successfully');
        window.location.href='index.php';
        </script>
      <?php
      }else{
      ?>
        <script type="text/javascript">
        alert('error occured while updating data');
        </script>
      <?php
    }
  }
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
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
<title>CRUD Operations</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Operations</label>
    </div>
</div>

<div id="body">
 <div id="content">
 <form method="post">  
      <table align = "center">
        <tr align="center">
          <td><a href = "index.php"> Back to Main Page </a></td>
        </tr>

        <tr>
          <td>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $fetched_row['fname']; ?>" required />
            <span class="error">* <br><?php echo $fnameErr;?></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $fetched_row['lname']; ?>" required />
            <span class="error">* <br><?php echo $lnameErr;?></span>
          </td>
        </tr>

        
        <tr>
          <td>
            <input type="text" name="email" placeholder="Email" value="<?php echo $fetched_row['email']; ?>" required />
            <span class="error">* <br><?php echo $emailErr;?></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="homeadd" placeholder="Home Address" value="<?php echo $fetched_row['homeadd']; ?>" />
            <span class="error">* <br><?php echo $homeaddErr;?></span>
          </td>
        </tr>
       
        </tr>
          <td>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female"> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male"> Male 
            <span class="error">* <br><?php echo $genderErr;?></span>
          </td>
        </tr>

        
        <tr>
          <td>
            <textarea name="comment" placeholder="insert comment here" rows="3" cols="30" value="<?php echo $fetched_row['comment']; ?>"><?php echo $fetched_row['comment']; ?></textarea>
          </td>
        </tr>
        
        <td>
          <p><span class="error">* required field </span></p>
          <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
          <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
        </td>
        </tr>
      </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
