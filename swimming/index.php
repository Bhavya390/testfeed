<?php
require ('../core/init.php');

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
                        header('Location: ../edit_home.php');
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Swimming - NITT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/jquery.colorbox-min.js"></script>
	<link rel="stylesheet" href="css/colorbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
	window.addEventListener('resize', responsive, false);                function responsive() {

    var dom = document.getElementById('id');
    var DomRatio = dom.height / dom.width;
    var windowRatio = window.innerHeight / window.innerWidth;
    var width;
    var height;

    if (windowRatio < domRatio) {
        height = window.innerHeight;
        width = height / domRatio;
    } else {
        width = window.innerWidth;
        height = width * domRatio;
    }

    dom.style.width = width + 'px';
    dom.style.height = height + 'px';
};
	</script>
</head>

<body data-spy="scroll" data-target="#myScrollspy">
<div class="container">
    <div class="title">
        <h1>The Swimmers of NITT</h1>
    </div>
    <div class="row" style="position:absolute; left:0px;">
        <div class="col-xs-2" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked affix-top" data-spy="affix" data-offset-top="125">
                <li class="active"><a href="../hpage.php">HOME</a></li>
                <li><a href="#section-1">LIVE</a></li>
                <li><a href="#section-2">Gallery</a></li>
                <li><a href="#section-3">Team</a></li>
                <li><a href="../blogpage/bloghome.php">Blog</a></li>
                <li><a href="#section-5">Admin</a></li>
                <li><a href="#section-6">Contact Us</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h2 id="section-1">UPDATES</h2>
            <hr style="border-top: 2px dotted black; padding:3px;" />
            <div style="position:relative">
	            <div style="float:left; background:white; width : 450px; height:500px; margin-left:20px; position:relative;">
	            	<p><center>
	            		<?php
    					$f=$_GET['id'];
    					$data=$general->score($f);
    					?>
	            		<h1>Live Score</h1>
	
	            		<h3><?php echo "<span>".$data['oppname']."  " .$data['oppscore']."-" .$data['homename']." ".$data['homescore']."</span>"?></h3>
	            		</center>
	            	</p>
	            </div>
	            <div style="background:white; float:right; width:450px; height:500px; position:relative; left:-20px; overflow:auto">
	            	<p><center>
	            		<h1>Updates</h1>
	            		 <?php
             			 $f=$_GET['id'];
             			 $data=$general->posts($f);
              			foreach($data as $reach)
              			{
              			?>
              			<h4><?php echo $reach['postTitle']?></h4>
              			<h5>Posted On:  <?php echo $reach['postDate']?>
              			</h5>
              			 <p><?php echo $reach['postDesc']?></p>
                   		 <p><?php echo $reach['postCont']?></p>
                   		 <?php
                   		}?>
	            		</center>
	            	</p>
	            </div>
            </div>
            
            <h2 id="section-2" style="top:25px; position:relative">Gallery</h2>
            <br>
            <hr style="border-top: 2px dotted black; padding:3px;" />
            <div style="background:white; height:400px; position:relative; overflow:auto">
            	 <?php
              $f=$_GET['id'];
              $data=$general->gallery($f);
              foreach($data as $reach)
              {
              ?>
				<a class='gallery' href="../gallery/<?php echo $reach['file_name'];?>"><img src="../gallery/<?php echo $reach['file_name'];?>" height="100px" width="128px"></a>
		        <!--<a class='gallery' href="gall/gal2.jpg"><img src="gall/gal2.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal3.jpg"><img src="gall/gal3.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal4.jpg"><img src="gall/gal4.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal5.jpeg"><img src="gall/gal5.jpeg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal6.jpg"><img src="gall/gal6.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal7.jpg"><img src="gall/gal7.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal8.jpg"><img src="gall/gal8.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal9.jpg"><img src="gall/gal9.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal10.jpg"><img src="gall/gal10.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal2.jpg"><img src="gall/gal2.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal3.jpg"><img src="gall/gal3.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal4.jpg"><img src="gall/gal4.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal5.jpeg"><img src="gall/gal5.jpeg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal6.jpg"><img src="gall/gal6.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal7.jpg"><img src="gall/gal7.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal8.jpg"><img src="gall/gal8.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal9.jpg"><img src="gall/gal9.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal10.jpg"><img src="gall/gal10.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal2.jpg"><img src="gall/gal2.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal3.jpg"><img src="gall/gal3.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal4.jpg"><img src="gall/gal4.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal5.jpeg"><img src="gall/gal5.jpeg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal6.jpg"><img src="gall/gal6.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal7.jpg"><img src="gall/gal7.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal8.jpg"><img src="gall/gal8.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal9.jpg"><img src="gall/gal9.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal2.jpg"><img src="gall/gal2.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal3.jpg"><img src="gall/gal3.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal4.jpg"><img src="gall/gal4.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal5.jpeg"><img src="gall/gal5.jpeg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal6.jpg"><img src="gall/gal6.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal7.jpg"><img src="gall/gal7.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal8.jpg"><img src="gall/gal8.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal9.jpg"><img src="gall/gal9.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal10.jpg"><img src="gall/gal10.jpg" height="100px" width="128px"></a>
		        <a class='gallery' href="gall/gal10.jpg"><img src="gall/gal10.jpg" height="100px" width="128px"></a>-->
		        <script>
		            jQuery('a.gallery').colorbox({rel:'gal', maxWidth:'1280px', maxHeight:'720px'});
		        </script>
		        <?php
		}
        ?>
			</div>
			
            <hr>
            <h2 id="section-3">Team</h2>
            <div class="team" style="overflow:auto">
            	<table>
            		<?php
  					$f=$_GET['id'];
				    $data = $general->member($f);
  					foreach($data as $reach)
  					{?>
            		<tr>
            		<td>
            			<img src="../uploads/<?php echo $reach['file_name'] ?>">
            				
			            	<h2><center>Description</center></h2>
			            	<center>Name:<?php echo $reach['membername'];?></center>
			            	<center>dept:<?php echo $reach['dept'];?></center>
			            	<center>Position:<?php echo $reach['pos'];?></center>
			            	</td>
			            	
			        
            		</tr>
            		<?php
            	}?>
            		<!--<tr>
            		<td>
            			<img src="mem/mem2.jpg">
            				<p>
			            		<h2><center>Description</center></h2>
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.
			            	</p>
			        </td>
            		</tr>
            		<tr>
            		<td>
            			<img src="mem/mem3.jpg">
            				<p>
			            		<h2><center>Description</center></h2>
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.
			            	</p>
			        </td>
            		</tr>
            		<tr>
            		<td>
            			<img src="mem/mem4.jpg">
            				<p>
			            		<h2><center>Description</center></h2>
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.
			            	</p>
			        </td>
            		</tr>
            		<tr>
            		<td>
            			<img src="mem/mem5.jpg">
            				<p>
			            		<h2><center>Description</center></h2>
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.
			            		This mainly contains personal information and other basic details about this swimmer like name, department, year of study, experience, age, achievements and other details as needed.

			            	</p>
			        </td>
            		</tr>-->
            	</table>
            	
            </div>
            <hr>
            <h2 id="section-4">Blog</h2>
            <p>
            	A blog for the swimmers of NITT.<br>
            	Click <a href="../blogpage/bloghome.php">here</a> to visit our blog.<br>
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	Suspendisse a orci facilisis, dignissim tortor vitae, ultrices mi. Vestibulum a iaculis lacus. Phasellus vitae convallis ligula, nec volutpat tellus. Vivamus scelerisque mollis nisl, nec vehicula elit egestas a. Sed luctus metus id mi gravida, faucibus convallis neque pretium. Maecenas quis sapien ut leo fringilla tempor vitae sit amet leo. Donec imperdiet tempus placerat. Pellentesque pulvinar ultrices nunc sed ultrices. Morbi vel mi pretium, fermentum lacus et, viverra tellus. Phasellus sodales libero nec dui convallis, sit amet fermentum sapien auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu elementum nibh, quis varius libero.
            	
            </p>
            <hr>
            <h2 id="section-5">Admin</h2>
              <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
            <p>Login as admin here</p>
            <form action="" method="post" target="">
		        <input type="password" class="email_field" name="key" size="18" placeholder="Enter Key"  />
		        <input type="hidden" value="sicanstudios" name="uri"/>
		        <input type="hidden" name="loc" value="en_US"/>
		        <input class="email_btn" name="submit" type="submit" value="GO"/>
	      	</form>
	      	<hr>            
            <h2 id="section-6">Contact Us</h2>
            <p>For more details about the induction process and other queries, please contact us at:<br>9999999999</p>
        </div>
    </div>
</div>
</body>
</html>                                		