
<?php
require ('core/init.php');
$admin_id= $_SESSION['id'];

//if(isset($_POST['member_name'])&&isset($_POST['department'])&&isset($_POST['age'])&&isset($_POST['rollno'])&&isset($_POST['position']))
if(isset($_POST['buttonsave']))
{
	
	$membername=mysql_escape_String($_POST['member_name']);
	$dept=mysql_escape_String($_POST['department']);
	$age=mysql_escape_String($_POST['age']);
	$rollno=mysql_escape_String($_POST['rollno']);
	$postion=mysql_escape_String($_POST['position']);
	$aboutme = mysql_escape_string($_POST['aboutme']);
	$data = $users->addmember($admin_id,$membername,$age,$rollno,$dept,$postion,$aboutme);
exit();
	
}

if(isset($_POST['editvalue']))
{
	$ide1 = $_POST['id'];
	$data = $users->memberedit($admin_id,$ide1);
	header("Content-type: text/x-json");
	echo json_encode($data);
	exit();
}
//code update
if(isset($_POST['Update']))
{
	
	$name = $_POST['upname'];
	$rollno = $_POST['uprollno'];
	$age = $_POST['upage'];
	$dept = $_POST['updept'];
	$pos = $_POST['uppos'];
	$id =$_POST['upid'];
	$aboutme = $_POST['upabout'];
	$data = $users->updatemembers($id,$name,$dept,$age,$rollno,$pos,$aboutme);
	if($data)
	{
		echo "success update";
	}
}


//code delete

if(isset($_POST['deletes']))
{
	$id = $_POST['id'];
	$data = $users->deletemember($id);
}
if(isset($_POST['showtable']))
{

		$data = $users->member($admin_id);
		/*echo "<table border='1'>
		<tr>
		<th>MemberName</th>
		<th>Rollno</th>
		<th>Department</th>
		<th>Age</th>
		<th>Position</th>
		</tr>";*/
		foreach($data as $reach)
		{
		   	
		
			$name=$reach['membername'] ;
			$dept = $reach['dept'];
			$id =$reach['id_member1'];
			$age =$reach['age'];
			$rollno =$reach['rollno'];
			$pos =$reach['pos'];
			$aboutme=$reach['aboutme'];
			$image=$reach['file_path'];
			echo "<tr>
	               		<td>$name</td>
				<td>$rollno</td>
				<td>$dept</td>
				<td>$age</td>
				<td>$pos</td>
				<td>$aboutme</td>
				<td>$image</td>
				<td><a ide='$id' class ='edit' href='#?ide=$id'>Edit</a>|
				<a idd='$id' class='delete' href='#?idd=$id'>Delete</a></td>
			</tr>";

		       /* echo "<td>".$rollno."</td>";
		        echo "<td>".$dept."</td>";
			echo "<td>".$age."</td>";
			echo "<td>".$pos."</td>";
		        echo "<td>";
			echo '<div >';
			echo"<a href='#?id=".$id."'><input type='button'  name='edit' value='Edit'></a>";
			echo "<a href='#?idd=".$id."'><input type='button'  name='delete' value='Delete'></a>";
			
			echo '</div>';
			echo "</td>";*/

}
//echo '</table>';
exit();

}
?>

</style>
<link rel="stylesheet" type="text/css" href="css/stylemember.css" >
<script type="text/javascript" src="http://ajax.googleapis.com/
	ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type ="text/javascript" src="../ajax/js/jquery-1.9.1.js"></script>

<body>
<div id ="memberadd">

	<tr>
	<input type = "hidden" value="" id="id"/>
	<td>MemberName</td>
	<td>:</td>
	<td><input type="text" id="member_name" name="member_name" value="<?php echo $data['membername'];?>" ></td>
	
		<td>Department</td>
		<td>:</td>
		<td><input type="text" id="department" name="department" value="<?php echo $data['dept'];?>" ></td>
		
		<td>Age</td>
		<td>:</td>
		<td><input type="number" id="age" name="age" value="<?php echo $data['age'];?>"></td>
		
		<td>Rollno</td>
		<td>:</td>
		<td><input type="text" id="rollno" name="rollno" value="<?php echo $data['rollno'];?>"></td>
		
		<td>Position</td>
		<td>:</td>
		<td><input type="text" id="position" name="position" value="<?php echo $data['pos'];?>"></td>
		</tr>
		
		<td>About Me</td>
		<td>:</td>
		<td><input type="text" id="aboutme" name="aboutme" value="<?php echo $data['aboutme'];?>"></td>
		</tr>

<input type ="submit" id="btn" value="insert">
<input type ="submit" id="update" value="update">

</div>
<div>
<table border ="1">
	<thead>
		<th>MemberName</th>
		<th>Rollno</th>
		<th>Department</th>
		<th>Age</th>
		<th>position</th>
		<th>Aboutme</th>
		<th>Imageurl</th>
		<th>Action</th>
		
		
	</thead>
	<tbody id="showdata"></tbody>
	</thead>
</table>
</body>
<script type="text/javascript">

$(function(){


	showdata();
	//create ajax update
		$('#update').click(function(){
			var id = $('#id').val()-0;
			//var id =$_POST['id'];
			alert(id);
			//var id = $(this).attr('ide');
		//	alert(id);
			var name =$('#member_name').val();
			var rollno =$('#rollno').val();
			var dept =$('#department').val();
			var age =$('#age').val();
			var position =$('#position').val();
			var aboutme = $('#aboutme').val();
			$.ajax({
				url 	: "addmember.php",
				type	: "POST",
				async	: false,
				data 	: {
						Update 		: 1,
						upid 		: id,
						upname 		: name,
						uprollno 	: rollno,
						updept 		: dept,
						upage 		: age,
						uppos 		: position,
						upabout     : aboutme
					},
				success:function(up)
				{
					//alert(up);
					alert("success update");
					$('input[type=text]').val('');
					showdata();
				}
		});
		});
	//end ajax
	//delte record
	$('body').delegate('.delete','click',function(){

		var IdDelete = $(this).attr('idd');
		var test= window.confirm("DO YOU WANT TO DELETE THIS RECORD")
		if(test)
		{
		{
			$.ajax({

				url 	: "addmember.php",
				type	: "POST",
				async	: false,
				data 	: {

					deletes : 1,
					id     : IdDelete
					},
				success:function(){
				alert("Success Delete");
				showdata();
				}
				});
		}
		}
	});
	$('body').delegate('.edit','click',function(){

		var IdEdit = $(this).attr('ide');
		
		$.ajax({
				url		: "addmember.php",
				type 		: "POST",
				datatype 	: "JSON",
				data  		: {
							editvalue : 1,
							id         : IdEdit
					 	   },
				success : function(show)
				{
					$('#id').val(show.id_member1);
					$('#member_name').val(show.membername);
					$('#department').val(show.dept);
					$('#age').val(show.age);
					$('#rollno').val(show.rollno);
					$('#position').val(show.pos);
					$('#aboutme').val(show.aboutme);
				}
			});
	});

$('#btn').click(function()
{
var name = $('#member_name').val();
var dept =$('#department').val();
var ageof = $('#age').val(); 
var rollnum =$('#rollno').val();
var pos =$('#position').val();
var aboutme = $('aboutme').val();
//var datastring ='member_name='+name+'department='+dept+'age='+age+'rollno='+rollno+'position='+position;
if(name.length>0&&dept.length > 0&& ageof.length > 0&& rollnum.length > 0&& pos.length >0&&aboutme.lenght>0)
{
$.ajax({
	type :  "POST",
	url  : "addmember.php",
	async: false,
	data :	{
 		buttonsave : 1,
		member_name : name,
		department : dept,
		age : ageof,
		rollno : rollnum,
		position : pos,
		aboutme :aboutme

		},
success : function(result)
{
	alert("member is added");
	showdata();
	header('Location: edit_home.php');			
}
});
}
else
{
	alert("Enter the fields");
	//$("#member_name").focus();
}
	});
})

function showdata ()
{

	$.ajax({
		type  : "POST",
		url   : "addmember.php",
		async : false,
		data  : { 
				showtable : 1
			},
		success : function (re)
		{
		$('#showdata').html(re);	
		}

	});
}
</script>
<?php


if(isset($_POST["post_file"])){

	if($_POST["post_file"] != ""){

		$valid_files = array("png", "jpg", "gif"); // include the valid image file extensions

		$file_name	 = $_FILES["your_file"]["name"]; // get the image name you posting

		$file_name_exp = explode(".", $file_name); // explode the uploaded image to get extension

		$file_extension = $file_name_exp[1]; // get extension

		if(in_array($file_extension, $valid_files)){ // check that image is valid or not

			$change_file_name = strtolower(str_replace(" ", "_", $file_name_exp[0])); // change the image name

			$file_name		  = $change_file_name.".".$file_extension; // join the new image name and its extension

			$folder_name	  = "uploads/"; // get the directory name which you want to upload the image make sure this directory has 0755 permision

			$target			  = $folder_name.$file_name; 

			$temp_name		  = $_FILES["your_file"]["tmp_name"]; // get the temp name of the image

			$move			  = move_uploaded_file($temp_name, $target); // move_uploaded_file function will let us to copy the file from your local drive to your root directory

			if($move){

				 $r = $users->uploadPhoto($file_name,$admin_id);
				//mysql_query("INSERT INTO `upload` (file_name, post_date) VALUES ('$file_name', now())");
				echo "<script type=\"text/javascript\">window.location = 'upload1.php?result=success';</script>";	

			}else{

				echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

			}

		}else{

			echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

		}

	}else{

		echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

	}

}

?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




</head>



<body>



<?php if(isset($_GET["result"]) && $_GET["result"] == "error"){ echo "<h3 class=\"error\">Oops! something went wrong. Please upload again</h3>"; } ?>

<?php if(isset($_GET["result"]) && $_GET["result"] == "success"){ echo "<h3 class=\"success\"> Image uploaded successfully</h3>";} ?>

<br/>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<table class="mytable">

<tr>

	<td><label>Select an image : </label></td>

	<td><input type="file" name="your_file" /></td>

</tr>

<tr>

	<td colspan="2"  align="center"><input type="submit" name="post_file" class="button" value="Upload This Image" /></td>

</tr>




</table>

</form>




	




</body>

</html>
