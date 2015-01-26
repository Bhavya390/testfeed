<?php
require ('core/init.php');
$admin_id= $_SESSION['id'];
if(isset($_GET['id']))
{
$id = $_GET['id'];

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

			if($move){

				 $r = $users->uploadPhoto($file_name,$id);
				//mysql_query("INSERT INTO `upload` (file_name, post_date) VALUES ('$file_name', now())");
				echo "<script type=\"text/javascript\">window.location = '?success';</script>";	

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

?>
<body>

<h2>Image Upload only in jpg ,gif and png </h2>

<?php if(isset($_GET["result"]) && $_GET["result"] == "error"){ echo "<h3 class=\"error\">Oops! something went wrong. Please upload again</h3>"; } ?>

<?php if(isset($_GET["success"]) ){ echo "<h3 class=\"success\"> Image uploaded successfully</h3>"; header('Location: edit_home.php');} ?>

<br/>

<form action="" method="post" enctype="multipart/form-data">

<table class="mytable">

<tr>

	<td><label>Select an image : </label></td>

	<td><input type="file" name="your_file" /></td>

</tr>

<tr>

	<td colspan="2"  align="center"><input type="submit" name="post_file" class="button" value="Update Image" /></td>
	<td colspan="2"  align="center"><a href="edit_home.php"><input type="button" name="back" class="button" value="Edit page" /></a></td>

</tr>




</table>

</form>
<?php


	
}

?>
