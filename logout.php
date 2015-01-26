<?php
require ('core/init.php');

session_start();
session_destroy();
?>

<?php header('Location:hpage.php');
?>
