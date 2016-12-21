
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
<style>
body
{
 background:#f9f9f9;
 font-family:"Courier New", Courier, monospace;
}
#header
{
 width:100%;
 height:50px;
 background:#00a2d1;
 color:#f9f9f9;
 font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
 font-size:35px;
 text-align:center;
}
#header a
{
 color:#fff;
 text-decoration:blink;
}
#body
{
 margin-top:50px;
}
table
{
 width:80%;
 font-family:Tahoma, Geneva, sans-serif;
 font-weight:bolder;
 color:;
 margin-bottom:80px;
}
table a
{
 text-decoration:none;
 color:#00a2d1;
}
table,td,th
{
 border-collapse:collapse;
 border:solid #d0d0d0 1px;
 padding:20px;
}
table td input
{
 width:97%;
 height:35px;
 border:dashed #00a2d1 1px;
 padding-left:15px;
 font-family:Verdana, Geneva, sans-serif;
 box-shadow:0px 0px 0px rgba(1,0,0,0.2);
 outline:none;
}
table td input:focus
{
 box-shadow:inset 1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
}
table td button
{
 border:solid #f9f9f9 0px;
 box-shadow:1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
 background:#00a2d1;
 padding:9px 15px 9px 15px;
 color:#FAAFBA;
 font-family:Arial, Helvetica, sans-serif;
 font-weight:bolder;
 border-radius:3px;
 width:49.5%;
}
table td button:active
{
 position:relative;
 top:1px;
}
</style>
<body>
<center>



<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th id="add_data"colspan="10" style="cursor: pointer"> <a href="<?php echo base_url('index.php/Users/add_form')?>"">Add Data Here </a></th>
    </tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Home Address</th>
    <th>Gender</th>
    <th>Comment</th>
    <th colspan="2">Operations</th>
    </tr>
     <?php foreach ($user_list as $u_key){ ?>
        
        <tr>
        <td><?php echo $u_key->fname; ?></td>
        <td><?php echo $u_key->lname; ?></td>
        <td><?php echo $u_key->email; ?></td>
        <td><?php echo $u_key->homeadd; ?></td>
        <td><?php echo $u_key->gender; ?></td>
        <td><?php echo $u_key->comment; ?></td>
  
        <td align="center"><a href="<?php echo base_url() . "index.php/users/show_users_id/" . $u_key->user_id; ?>" onClick="show_confirm('edit',<?php echo $u_key->user_id;?>)"><img src="<?php echo base_url();?>/images/edit.png" style="width: 20px"></img></a></td>
        

        <td align="center"><a href="<?php echo base_url() . "index.php/users/delete/" . $u_key->user_id; ?>" onClick="show_confirm('delete',<?php echo $u_key->user_id;?>)"><img src="<?php echo base_url();?>/images/delete.jpg" style="width: 30px"></img></a></td>
        
        </tr>

        <?php }?>
    </table>
    </div>
</div>

</center>
</body>
</html>
