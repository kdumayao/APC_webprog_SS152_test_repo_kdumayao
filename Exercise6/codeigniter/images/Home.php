<!DOCTYPE HTML>
<html>

<style>
	body {background-color: white; 
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #FAAFBA;
    font-family: Luna;
}
li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 40px 30px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #F9A7B0;
}
.active {
    background-color: #FFFFFF;
}
h3.gallery {
    border-style: solid;
    border-width: 2px;
    margin-top: 20px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left: 50px;
    padding-top: 10px;
}
h3.about {
    border-style: solid;
    border-width: 2px;
    margin-top: 3px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left: 50px;
    padding-top: 10px; 
}
h3.contact {
    border-style: solid;
    border-width: 2px;
    margin-top: 2px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left: 50px;
    padding-top: 10px;		

</body>
</style>
<font color="black" font face="Luna" font size="2"> 
<center>
<title>Katrina Umayao</title>
</center>
<nav class="navbar navbar-inverse navbar-fixed-top">
<ul class ="nav navbar-nav">
  <li><a class= "scroll-link" href="#about">About</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#gallery">Gallery</a></li>
  <li><a href="#home">Home</a></li> 
  <li><a href="add_data.php">Form</a></li>  
</ul>
</nav>	
<center>
<br><br><br>
<div id = "home">
<img src = "KJ.png">
<br>
</div> 

</center>
</h1>
<font color="black">
</head>
<body>


<center>
<br><br><br><br><br><br>
<div id = "gallery">
<br>

<table>

<font size = "5">
<h3 class ="gallery">GALLERY</h3> 

	<tr>
<p align="center">
	<td> <img src= "IMG_0783.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_9673.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_4082.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_3427.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	

</tr>
</table>

<center>
<br>
</center>
<table>

	<tr>

	<td> <img src= "IMG_0413.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_4646.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_5513.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_1020.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>


</tr>
</table>


<center>
<br>
</center>
<table>

	<tr>

	<td> <img src= "IMG_1117.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_1134.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_1895.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>
	<td> <img src= "IMG_1927.jpg" width="300" height="300" alt="CHEVER"/> </th> </td>


</tr>
</table>
</div>
<div id = "about">
<br>	                	
<h3 class= "about">About Me</h3>
<font size = "4">
<img src = "DSC_1077.jpg" width = "600" height = "400" alt = "CHEVER"/> 
	                   
<p> Movies. Books. Travel. Photography. Sweets. Fashion.
<p> Flowers and Everything Nice
<p>I believe in pursuing your dreams, in doing what you love every moment of every day, and in inspiring others to do the same. Because life is what you're living, so make the best of it!

<h4 class = "trivia"><u> TRIVIA </u></h4>

	<button type="button" onclick="document.getElementById('sample1').innerHTML = 'I can dance anything except Hip Hop.'">Trina Facts # 1</button><br>
	<p id= sample1> </p>
	<button type="button" onclick="document.getElementById('sample2').innerHTML = 'Back in high school, I was part of our school s track and field team.'">Trina Facts # 2</button><br>
	<p id= sample2> </p>
	<button type="button" onclick="document.getElementById('sample3').innerHTML = 'I have two siblings and I am the middle child. '">Trina Facts # 3</button><br>
	<p id= sample3> </p>
	<button type="button" onclick="document.getElementById('sample4').innerHTML = 'I sleep talk when I am tired.'">Trina Facts # 4</button><br>
	<p id= sample4> </p>
	<button type="button" onclick="document.getElementById('sample5').innerHTML = 'Savage attitude with a heart of gold.'">Trina Facts # 5</button><br>
	<p id= sample5> </p>

</font>	                    
</p>
	               
</div>
	            
</div>
	            	
</div>
<br>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<div id = "contact">
<br>
<center>
<h3 class = "contact"> Contact </h3>
<img src="phone.png" height="50"><font size = "3"><p>09267461708</p></font>
<a href="https://www.facebook.com/triinakat"><img src="facebook.png" height="50"></a><font size = "3"><p>Katrina Umayao</p></font>
<a href="https://twitter.com/triinakat"><img src="twitter.png" height="50"></a><font size = "3"><p>@triinakat</p></font> 
<a href="https://instagram.com/triinakat"><img src="insta.jpg" height="50"></a><font size = "3"><p>@triinakat</p></font>  
</div>
</font>

</body>
</html>