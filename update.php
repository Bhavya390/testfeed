<?php
		require ('core/init.php');

		

$admin_id= $_SESSION['id'];	
$pos_id =$_GET['id'];
$title=$_POST['postTitle'];
$content =stripslashes($_POST['postCont']);
$desc=$_POST['postDesc'];
date_default_timezone_set('Asia/Calcutta');
$date= date('Y-m-d h-i-s'); 
$r = $users->updatepost($title,$content,$desc,$date,$pos_id);

/*$q="INSERT INTO `posts`( `Id`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES ('$id','$title','$desc','$content','$date')";

$r=mysql_query($q);*/

if (!$r) {

  die('Error: ' . mysql_error());

}

header('location:edit_home.php');
?>
