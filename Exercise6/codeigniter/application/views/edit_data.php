
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<style>
#hide{
  display:none;
}

</style>

<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Operations</label>
    </div>
</div>

<div id="body">
 <div id="content">
 <?php foreach ($single_users as $users): ?>
 <form method="post" action="<?php echo base_url() . "index.php/users/update_users_id1"?>">

      <table align = "center">
        <input type="text" id="hide" name="did" value="<?php echo $users->user_id; ?>">
        <tr>
          <td>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $users->fname; ?>" required >
            <span class="error">* <br></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $users->lname; ?>" required >
            <span class="error">* <br></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="email" placeholder="Email" value="<?php echo $users->email; ?>" required >
            <span class="error">* <br></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <input type="text" name="homeadd" placeholder="Home Address" value="<?php echo $users->homeadd; ?>" >
            <span class="error">* <br></span>
          </td>
        </tr>
       
        </tr>
          <td>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female" required> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male"> Male 
            <span class="error">* <br></span>
          </td>
        </tr>
        
        <tr>
          <td>
            <textarea name="comment" placeholder="Comment" rows="5" cols="40" value="<?php echo $users->comment; ?>"></textarea>
          </td>
        </tr>
        
        <td>
          <p><span class="error">* required field </span></p>
          <input type="submit" name="submit" value="Update"></td>
        </td>
        </tr>
      </table>
    </form>
    <?php endforeach; ?>
    </div>
</div>

</center>
</body>
</html>
