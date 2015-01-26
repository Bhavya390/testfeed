<?php
require ('core/init.php');

if (empty($_POST) === false) {

        $accessKey = trim($_POST['key']);

        if (empty($accessKey) === true ) {
                $errors[] = 'Sorry, but we need your access key for team.';
        } else {

                $login = $users->login($accessKey);
                if ($login === false) {
                        $errors[] = 'Sorry, that accessKey is invalid';
                }else {
                        // username/password is correct and the login method of the $users object returns the user's id, which is stored in $login

                        $_SESSION['id'] =  $login;// The user's id is now set into the user's session  in the form of $_SESSION['id']     
                        echo $_SESSION['id'];
                        if(isset($_SESSION['id']))
                        {
                        #Redirect the user team to home.php.
                        header('Location:sportsfeteedit.php');
                        }
                        else
                        {
                                echo "cannot open without login";
                        }
                        exit();
                }
        }
}

?>
<html>
<head>
	<title>SPORTFETE 2015</title>
</head>
<body>
	<h1><center>SPORTSFETE 15 welcomes all</center></h1>
	<h3>Admin Login</h3>
            <form action="" method="post" target="">
		        <input type="password" class="email_field" name="key" size="18" placeholder="Enter Key"  />
		        <input type="hidden" value="sicanstudios" name="uri"/>
		        <input type="hidden" name="loc" value="en_US"/>
		        <input class="email_btn" name="submit" type="submit" value="GO"/>
	      	</form>
                    </ul>
	<div class="blob" id="one">
		<h2><center>SPORT</center></h2>
	</div>
	<div class="blob" id="two">
		<h2><center>DEPARTMENTS</center></h2>
	</div>
<style>
	.blob{
		border-radius: 50%;
		background: black;
		color: navy;
		height: 500px;
		width: 500px;
		line-height: 50%;
	}
	#one{
		float: left;
	}
	#two{
		float: right;
	}
</style>
</body>
</html>