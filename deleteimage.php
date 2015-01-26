<?php
require ('core/init.php');
$admin_id= $_SESSION['id'];
if(isset($_GET['id']))
{
$id = $_GET['id'];
	$data = $users->deletegallery($admin_id,$id);
	if($data)
	{
		echo "Sucessfully deleted ";
	}
header('location:gallery.php');
}

?>
