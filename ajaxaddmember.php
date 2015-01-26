<?php
require ('core/init.php');

		

	$admin_id= $_SESSION['id'];	

	
?>
<body>
<form name="form1" action="" method="POST">
<table>
	<tr>
		<td>MemberName</td>
		<td>:</td>
		<td><input type="text" id="member_name" name="member_name">
	
	
		<td>Age</td>
		<td>:</td>
		<td><input type="number" id="age" name="age">
	
	
	
		<td>Rollno</td>
		<td>:</td>
		<td><input type="text" id="rollno" name="rollno">
		
	
		<td>Department</td>
		<td>:</td>
		<td><input type="text" id="dept" name="dept">
	
	
		<td>Position</td>
		<td>:</td>
		<td><input type="text" id="position" name="position">
	
	<td colspan="2" align="center"><input type="button" id="insert" value="insert" onClick="as();"></td>
	
	</tr>
<tr>
<td colspan="2" align="center"><div id="d1"></div></td></tr>
</table>
</form>
</body>
<script type="text/javascript">
function as()
{
	
var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","ins.php?member_name="+document.getElementById("member_name").value+"&age="+document.getElementById("age").value+"&rollno="+document.getElementById("rollno").value+"&dept="+document.getElementById("dept").value+"&position="+document.getElementById("position").value,false);
xmlhttp.send(null);

document.getElementById("d1").innerHTML=xmlhttp.responseText;
}
</script>


<!-- to edit and delete the member details -->

