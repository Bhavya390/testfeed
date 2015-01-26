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
<html>
<head>
<script src="js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="css/colorbox.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
<script>
$(document).ready(function(){
  $("#home").click(function(){
    $(".cuboid").css("transform","rotateX(0.01deg)");
    $("#rook").css("transform","translateX(5px)");
  });
});
$(document).ready(function(){
  $("#gall").click(function(){
    $(".cuboid").css("transform","rotateX(89.99deg)");
    $("#rook").css("transform","translateX(230px)");
  });
});
$(document).ready(function(){
  $("#team").click(function(){
    $(".cuboid").css("transform","rotateX(179.99deg)");
    $("#rook").css("transform","translateX(475px)");
  });
});
$(document).ready(function(){
  $("#admin").click(function(){
    $(".cuboid").css("transform","rotateX(269.99deg)");
    $("#rook").css("transform","translateX(870px)");
  });
});
$(document).ready(function(){
  	$(".blacktile").hover(function(){
    	$(".whitetile").css("opacity","0");
    },function(){
	  $(".whitetile").css("opacity","1");
  });
	$(".whitetile").hover(function(){
	    $(".blacktile").css("opacity","0");
	},function(){
	$(".blacktile").css("opacity","1");
	});
});
</script>
</head>

<body>
<img src="img/chess_thumbnail.jpeg" height="90px" style="position:relative; float:left; left:5px; top:5px; z-index:1">
		<img id="rook" src="img/rook.gif" height="75px">
		<div class="menu">
			<ul>
				<li id="home" onclick="homefunc()">Home</li>
				<li id="gall" onclick="gallfunc()">Gallery</li>
				<li id="team" onclick="teamfunc()">Team</li>
				<li id="blog" onclick="blogfunc()">Blog</li>
				<li id="admin" onclick="admfunc()">Admin</li>
			</ul>
		</div>
		<div class="cuboid">
			<div id="onehome">
				<div id="live">
					<h1><center>Live Score</h1>
					<?php
    					$f=$_GET['id'];
    					$data=$general->score($f);
    					?>
					
					<h2><center><h3><?php echo "<span>".$data['oppname']."  " .$data['oppscore']."-" .$data['homename']." ".$data['homescore']."</span>"?></h3></h2>
					
				</div>
				<div id="update" style="overflow:auto">
					<h1><center>Updates</h1>
					 <?php
             			 $f=$_GET['id'];
             			 $data=$general->posts($f);
              			foreach($data as $reach)
              			{
              			?>
              			<h4><center><?php echo $reach['postTitle']?></h4>
              			<h5><center>Posted On:  <?php echo $reach['postDate']?>
              			</h5>
              			 <p><center><?php echo $reach['postDesc']?></p>
                   		 <p><center><?php echo $reach['postCont']?></p>
                   		 <?php
                   		}?>
                   		
				</div>
			</div>
			<div id="twogall">
				<div id="showcase">
					<table cellspacing="0" cellpadding="0" class="tiles">
						<tr>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
						</tr>
						<tr>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
					 	</tr>
						<tr>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
						</tr>
						<tr>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
							<td class="white" width="200px" height="115px"></td>
							<td class="black" width="200px" height="115px"></td>
					 	</tr>
					</table>
					 <?php  
  					    $f = $_GET['id'];
      					$images = $general->gallery($f);
      					$i = 0;
      					foreach($images as $reachs)
      					{
						?>
					<table cellspacing="0" cellpadding="0" class="images">
						<tr>
							<td class="blacktile"><a class="gallery" href="../gallery/<?php echo $reachs['file_name'];?>"><img src="../gallery/<?php echo $reachs['file_name'];?>" width="200px" height="115px"></a></td>
						</tr>
							<!--<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
						</tr>
						<tr>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
					 	</tr>
						<tr>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
						</tr>
						<tr>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
							<td class="whitetile"><a class="gallery" href="./img/2.jpg"><img src="./img/2.jpg" width="200px" height="115px"></a></td>
							<td class="blacktile"><a class="gallery" href="./img/1.jpg"><img src="./img/1.jpg" width="200px" height="115px"></a></td>
					 	</tr>-->
					</table>
<?php }?>
				</div>

			</div>

			<script>
				jquery('a.gallery').colorbox({rel:'gal', maxWidth:'1280px', maxHeight:'720px'});
			</script>

			<div id="threetm" style="overflow:auto">
				<table style="background:white; position:relative; left:30px;">
					<?php
  					$f=$_GET['id'];
				    $data = $general->member($f);
  					foreach($data as $reach)
  					{?>
					<tr>
						<td>
							<div>
							<img src="../uploads/<?php echo $reach['file_name'] ?>" width="100px" height="100px" style="float:left; margin:20px">
							<p style="float:right;">
							<h2><center>Description</h2>
							<p><center><?php echo $reach['membername'];?></center></p>
							<p><center><?php echo $reach['dept'];?></center></p>
							<p><center><?php echo $reach['pos'];?></center></p>
							</p>
							</div>
						</td>
					</tr>
					<?php
				}?>
					<!--<tr>
						<td>
							<div>
							<img src="mem/mem2.jpg" width="100px" height="100px" style="float:left; margin:20px">
							<p style="float:right;">
							<h2><center>Description</h2>
							This mainly contains personal information and other basic details
							about this swimmer like name, department, year of study, experience,
							age, achievements and other details as needed.
							</p>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
							<img src="mem/mem3.jpg" width="100px" height="100px" style="float:left; margin:20px">
							<p style="float:right;">
							<h2><center>Description</h2>
							This mainly contains personal information and other basic details
							about this swimmer like name, department, year of study, experience,
							age, achievements and other details as needed.
							</p>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
							<img src="mem/mem4.jpg" width="100px" height="100px" style="float:left; margin:20px">
							<p style="float:right;">
							<h2><center>Description</h2>
							This mainly contains personal information and other basic details
							about this swimmer like name, department, year of study, experience,
							age, achievements and other details as needed.
							</p>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
							<img src="mem/mem5.jpg" width="100px" height="100px" style="float:left; margin:20px">
							<p style="float:right;">
							<h2><center>Description</h2>
							This mainly contains personal information and other basic details
							about this swimmer like name, department, year of study, experience,
							age, achievements and other details as needed.
							</p>
							</div>
						</td>
					</tr>-->
				</table>
			</div>

			<div id="fouradm" style="color:black;">
				<center><h1>ADMIN LOGIN HERE</h1>
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
		      	</center>
			</div>
		</div>
		<div id="footnotes">
			<p>About Us</p>
			<p>Details about team Inductions</p>
			<p>Contact</p>
		</div>
	<style type="text/css">
		body{
	background-image: url(img/chess_bg.jpg);
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
	background-size: 100%;
}
.menu{
	background: wheat;
	color: black;
	font-family: Futura, "Trebuchet MS", Arial, sans-serif;
	height: 100px;
	font-size: 300%;
	line-height: 0px;
	padding-left: 100px;
	border: 1px solid chocolate;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	-webkit-box-shadow: 0 2px 10px sienna, 0 0 4px 5px chocolate inset;
	box-shadow: 0 2px 10px sienna, 0 0 4px 5px chocolate inset;
	position: relative;
	top: -5;
}
ul{
	list-style: none;
}
li{
	display: inline;
	margin-right: 40px;
	margin-left: 40px;
}
#rook{
	position:relative; 
	float:left;
	left:40px;
	top:5px;
	z-index:1;
	-webkit-transition: -webkit-transform 3s;
	transition: transform 3s;
}
#onehome, #twogall, #threetm, #fouradm{
	position: relative;
	border: 1px solid rgba(147, 184, 189, .8);
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 5px 20px rgba(105, 108, 109, .3), 0 0 8px 5px rgba(208, 223, 226, .4) inset;
	box-shadow: 0 5px 20px rgba(105, 108, 109, .3), 0 0 8px 5px rgba(208, 223, 226, .4) inset;
	height: 500px;
	vertical-align: center;
	background-color: rgba(0,0,0,.3);
}
#onehome{
	margin-top: 10px;
	-webkit-transform: translateZ(250px);
	transform: translateZ(250px);
}
#twogall
{
	background-color: rgba(255,255,255,0.3);
	-webkit-transform: translateY(-250px) rotateX(-89.99deg);
	transform: translateY(-250px) rotateX(-89.99deg);
	color: white;
}
#threetm{
	-webkit-transform: translateY(-1000px) translateZ(-250px) rotateX(180.01deg);
	transform: translateY(-1000px) translateZ(-250px) rotateX(180.01deg);
}
#fouradm{
	background-color: rgba(255,255,255,0.3);
	-webkit-transform: translateY(-1750px) rotateX(90.01deg);
	transform: translateY(-1750px) rotateX(90.01deg);
	color: white;

}
.cuboid{
	position: relative;
	top:25px;
	-webkit-transition: -webkit-transform 3s;
	transition: transform 3s;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
	height: 500px;
}

#live{
	background: sienna;
	height: 450px;
	width: 550px;
	margin-top: 25px;
	margin-left: 20px;
	float: left;
}
#update{
	background: sienna;
	height: 450px;
	width: 650px;
	margin-top: 25px;
	margin-right: 20px;
	float: right;
}
#footnotes{
	position: relative;
	margin-top: 40px;
	border: 2px solid;
    border-radius: 25px;
	background:black; 

}
#footnotes p{
	position: relative;
	margin-top: 40px;
	width:1200px; 
	position:relative; 
	left:30px; 
	color:white;
}
.images, .tiles{
	border-collapse: collapse;
	border-spacing: 0;
}
.black{
	background: black;
}
.white{
	background: white;
}
.images{
	position: absolute;
	z-index: 1;
	top: 20px;
	left: 30px;
}
.tiles{
	position: absolute;
	z-index: 0;
	top: 20px;
	left: 30px;
}
.images td, .tiles td {
    line-height:0;
}
	
</style>
</body>
</html>
