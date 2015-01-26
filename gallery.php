<?php
error_reporting(0);
require ('core/init.php');
$admin_id= $_SESSION['id'];

if(isset($admin_id))
{
if(isset($_POST["post_file"])){

	if($_POST["post_file"] != ""){

		$valid_files = array("png", "jpg", "gif"); // include the valid image file extensions

		$file_name	 = $_FILES["your_file"]["name"]; // get the image name you posting

		$file_name_exp = explode(".", $file_name); // explode the uploaded image to get extension

		$file_extension = $file_name_exp[1]; // get extension

		if(in_array($file_extension, $valid_files)){ // check that image is valid or not

			$change_file_name = strtolower(str_replace(" ", "_", $file_name_exp[0])); // change the image name

			$file_name		  = $change_file_name.".".$file_extension; // join the new image name and its extension

			$folder_name	  = "gallery/"; // get the directory name which you want to upload the image make sure this directory has 0755 permision

			$target			  = $folder_name.$file_name; 

			$temp_name		  = $_FILES["your_file"]["tmp_name"]; // get the temp name of the image

			$move			  = move_uploaded_file($temp_name, $target); // move_uploaded_file function will let us to copy the file from your local drive to your root directory

			/*if($move){

				 $r = $users->uploadgallery($file_name,$admin_id);
				echo "<script type=\"text/javascript\">window.location = '?result=success';</script>";	

			}else{

				echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	

			}

		}else{

			echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	

		}

	}else{

		echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	

	}*/
if($move){
				//mysql_query("INSERT INTO `upload` (file_name, post_date) VALUES ('$file_name', now())");
				$r = $users->uploadgallery($file_name,$admin_id);
				echo "<script type=\"text/javascript\">window.location = '?result=success';</script>";	
			}else{
				echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	
			}
		}else{
			echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	
		}
	}else{
		echo "<script type=\"text/javascript\">window.location = 'gallery.php?result=error';</script>";	
	}

}
}

?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Gallery</title>

<style type="text/css">

body{

	font-family:Arial;

	color:#333333;

	font-size:14px;

}

.mytable{

	margin:0 auto;

	padding:10px;

	border:#007EB2 dashed 2px;

	font-weight:bold;

}

.mytable tr{

	line-height:70px;

}

.button{

	background:#007EB2;

	border:none;

	padding:8px 10px;

	text-align:center;

	color:#FFF;

	cursor:pointer;

	border=radius:2px;

}

h2, h3{

	margin:0;

	padding:0;

	text-align:center;

}

.error{

	color:#F33C21;

}

.success{

	color:#008040;

}

</style>

</head>



<body>

<h2>Image Upload only in jpg ,gif and png </h2>

<?php if(isset($_GET["result"]) && $_GET["result"] == "error"){ echo "<h3 class=\"error\">Oops! something went wrong. Please upload again</h3>"; } ?>

<?php if(isset($_GET["result"]) && $_GET["result"] == "success"){ echo "<h3 class=\"success\"> Image uploaded successfully</h3>"; } ?>

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

<tr>

	<td colspan="2"  align="center"><input type="button" onClick="window.location='?view_images';" name="view_images" class="button" value="View Images" /></td>

</tr>


</table>

</form>

<?php

if(isset($_GET["view_images"])){

?>
<br/>
<table class="mytable">
<tr>
	
	<td><label>Imagename</label></td>
	<td><label>Image</label></td>
	<td><label>Action</label></td>
	</tr>
<?php
	$images = $users->showgallery($admin_id);
	$i =0;
	

	foreach($images as $reachs)
	{
		$i = $i+1;
		$imagename = $reachs['file_name'];
		$id = $reachs['pic_id'];

	?>
<tr>
<td><label><?php echo $imagename ;?></label></td>
<td><label><img src="gallery/<?php echo $reachs['file_name'];?>" alt ="<?php echo $reachs['file_name'];?> title="<?php echo $reachs['file_name'];?>" height="50" width="50"/></label></td>
<?php
echo "<td>";
echo "<a href='deleteimage.php?id=".$reachs['pic_id']."'><input type='button'  name='delete' value='Delete'></a>";
echo "</td>";			
}
?>
</tr>
</table>
<?php
}
?>




</body>

</html>
