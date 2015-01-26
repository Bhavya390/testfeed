<?php
require('core/init.php');
$admin_id = $_SESSION['id'];
$id = $_GET['id'];
$data = $users->cricscoretext($id);
$array = explode(" ",$data['postCont']);
$i=0;
foreach($array as $reach)
{
	$a[$i] = $reach;
	$i=$i+1;
}
?>
<form action="<?php echo"cricupdatescore.php?id=".$id; ?>" method="post">
<table>
<tr>
	<td>HOME</td>
	<tr><td>name</td><td><input type ="text" name="homename" id="homename" value="<?php echo $a[0] ;?>"></td></tr>
<td>Runs</td><td><input type="text" name="homeruns" id="homeruns" value="<?php echo $a[1] ;?>" ></td></tr>
<tr><td>wickets</td><td><input type="text" name="homewickets" id="homewickets" value="<?php echo $a[2] ;?>" ></td></tr>
<tr><td>Points_to_win</td><td><input type="text" name="hometowin" id="hometowin" value="<?php echo $a[3];?>"></td></tr>
<td>AWAY</td>
<tr><td>name</td><td><input type="text" name="oppname" id="oppname" value="<?php echo $a[4];?>"></td></tr>
<tr><td>Runs</td><td><input type="text" name="oppruns" id="oppruns" value="<?php echo $a[5];?>"></td></tr>
<tr><td>wickets</td><td><input type="text" name="oppwickets" id="oppwickets" value="<?php echo $a[6];?>" ></td></tr>
<tr><td>Points_to_win</td><td><input type="text" name="opptowin" id="opptowin" value="<?php echo $a[6];?>"></td></tr>
<tr><td><input type="submit" name="submit" value="EDIT"></td></tr>
</tr>
</table>
</table>
</form>