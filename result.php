<?php
/*$host   = 'localhost'; // alternatively, you can put '127.0.0.1' here
  $dbUser = 'root'; // I would never use root for a production
                    // user, but for a local installation, it is ok...
  $dbPass = 'manjula'; // or whatever it is set to be...
  $dbName = 'SportfeedsNITT'; // use your database name here
  $dbConn = mysql_connect($host, $dbUser, $dbPass)
                  or trigger_error(mysql_error(), E_USER_ERROR);
  mysql_select_db($dbName, $dbConn);*/
require('core/init.php');
$user 	= $users->teamdata($_SESSION['id']);
$admin_id = $_SESSION['id'];
//$r = $users->addpost($title,$content,$desc,$date,$admin_id);
/*$q="INSERT INTO `posts`( `Id`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES ('$id','$title','$desc','$content','$date')";
$r=mysql_query($q);*/
$content = $_POST['data'];
$len = strlen($content);
if($len>0)
{
	$r = $users->addmess($admin_id,$content);
}
else
{
	echo "Cannot save empty blog";
//echo $content."oi";
}
 //$sql = "INSERT INTO messages VALUES(NULL,'" . mysql_real_escape_string($_POST['data']) . "')";
 //$queryResource = mysql_query($sql, $dbConn) or die(mysql_error());
//$data = mysql_escape_String($_POST['data']);
//$r = $users->textedit($data);
?>
