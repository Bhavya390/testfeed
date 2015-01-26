<?php
require('core/init.php');
$admin_id = $_SESSION['id'];
$id = $_GET['id'];
$data = $users->scoretext($id);
$home_score =$data['homescore'];
$home_name =$data['homename'];
$opp_score=$data['oppscore'];
$opp_name=$data['oppname'];

/*$hscore = $_POST['homescore'];
$hname = $_POST['homename'];
$oscore =$_POST['oppscore'];
$oname =$_POST['oppname'];
$r = $users->updatescore($hscore,$hname,$oscore,$oname,$id);


if (!$r) {

  die('Error: ' . mysql_error());

}

header('location:edit_home.php');*/

?>
<form action="<?php echo"updatescore.php?id=".$id; ?>" method="post">
<table>
<tr>
<td><input type="number" name="homescore"id="homescore" value="<?php echo $home_score?>" ></td>
<td><input type ="text" name="homename" id="homename"value="<?php echo $home_name?>"></td>
<td><input type="number" name="oppscore" id="oppsore"value="<?php echo $opp_score ?>"></td>
<td><input type="text" name="oppname" id="oppname"value="<?php echo $opp_name?>"></td>
<td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</form>
