<?php 


		require ('core/init.php');

               $admin_id= $_SESSION['id'];
	
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			
			$q = $users->deleteblog($admin_id,$id);
			if($q)
			{
				header('location:edit_home.php');
			}
			else
			{
				echo mysql_error();
			}
		}
?>
