<?php
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
 mysqli_query($con, $sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)
{
 if(confirm('Sure to edit ?'))
 {
  window.location.href='edit_data.php?edit_id='+id;
 }
}
function delete_id(id)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='index.php?delete_id='+id;
 }
}
</script>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Operations- <a href="http://cleartuts.blogspot.com" target="_blank"></a></label>
    </div>
</div>

<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th id="add_data"colspan="10" onclick="window.location='add_data.php'" style="cursor: pointer"> Add Data Here </a></th>
    </tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Home Address</th>
    <th>Gender</th>
    <th>Comment</th>
    <th colspan="2">Operations</th>
    </tr>
    <?php
$sql_query="SELECT * FROM users";
$result_set=mysqli_query($con,$sql_query);
while($row=mysqli_fetch_row($result_set))
{
?>
        <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?></td>
        <td><?php echo $row[6]; ?></td>

  <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="edit.png" style="width:30px;height:30px" title="edit" align="EDIT" onmouseover="this.src='edit-hover.png';" onmouseout="this.src='edit.png';"></a></td>
                    <td class = "delete" align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="drop.png" style="width:30px;height:30px" title="delete" align="DELETE" onmouseover="this.src='drop-hover.png';" onmouseout="this.src='drop.png';"></a></td>
                </tr>
        <?php
 }
 ?>
    </table>
    </div>
</div>

</center>
</body>
</html>
