<?php



//include database connection

		//require ('core/connect/connection.php');

		require ('core/init.php');

		

	$admin_id= $_SESSION['id'];	

	echo $admin_id;



//echo '<h2>You posted:</h2><hr />'.$_POST['postTitle'] . '<hr />' . stripslashes($_POST['postCont']);

$title=$_POST['postTitle'];

$content =stripslashes($_POST['postCont']);

$desc=$_POST['postDesc'];

date_default_timezone_set('Asia/Calcutta');

$date= date('Y-m-d h-i-s'); 



$r = $users->addpost($title,$content,$desc,$date,$admin_id);

/*$q="INSERT INTO `posts`( `Id`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES ('$id','$title','$desc','$content','$date')";

$r=mysql_query($q);*/

if (!$r) {

  die('Error: ' . mysql_error());

}
header('Location:edit_home.php');







?>
