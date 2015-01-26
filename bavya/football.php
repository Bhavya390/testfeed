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
<html>

<head>

<title>FOOTBALL FEEDS</title>

<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../dist/css/bootstrap-theme.min.css" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style>

body
{
	margin: 0;
	padding: 0;
}

#container
{
	position: relative;
	height: 100%;
	width: 100%;
	background: url(../Res/campnou.jpg) fixed no-repeat;
}

#layer1
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 5;
}

#layer2
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 10;
}

#layer3
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 15;
	visibility: hidden;
}

#layer4
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 20;
	visibility: hidden;
}

#layer5
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 25;
	visibility: hidden;
}

#layer6
{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 30;
	
}

.fix-bar
{
	position: fixed;
	height: 5%;
	width: 80%;
	background-color: rgba(0,0,0,0.5);
	color: rgb(255,255,255);
	margin-top: 2%;
	margin-left: 10%;
	font-weight: bold;
}

.bar-btn
{
	float: left;
	margin-left: 2%;
	text-align: center;
	font-family: "segoeUI B";
	cursor: pointer;

}

#team
{
	height: 70%;
	width: 80%;
	margin-left: 10%;
	float: left;
	font-family: "segoeUI B";
	overflow:scroll;
	overflow-x:hidden;


}

.bar-btn:hover
{
	background-color: rgba(57,255,20,0.3);
}kl

@font-face
{
	font-family: "segoeUI";
	src: url(../segoeui.ttf);
}

@font-face
{
	font-family: "segoeUI B";
	src: url(../segoeuib.ttf);
}

.quote
{
	font-family: "segoeUI B";
	text-align: left;
	font-size: 18px;
	color: #FFF;
	width: 100%;
	height: auto;
	background-color: rgba(0,0,0,0.7);
	float: left;
	margin-top: 7%;
	
}

#banner
{
	text-align: left;
	margin-left: 10%;
	font-size: 80px;
	font-family: "segoeUI B";
	color: #FFF;
	margin-top: 3%;
	background-color: rgba(0,0,0,0.5);
}

.col{
	float: left;
	height: 75%;
	margin-left: 2%;
	width: 15%;
}

#live
{
	margin-left: 10%;
	width: 38%;
	height: 75%;
	float: left;
	background-color: rgba(0,0,0,0.5);
	margin-top: 10%;
	font-family: "segoeUI B";
	color: #FFF;
}

#news
{
	margin-left: 4%;
	width: 38%;
	height: 75%;
	float: left;
	background-color: rgba(0,0,0,0.7);
	margin-top: 10%;
	font-family: "segoeUI B";
	color: #FFF;
	overflow: scroll;
	overflow-x: hidden;
}

.clb_s
{
	float: left;
	width: 93%;
	height: 25%;
	margin-left: 3%;
	margin-top: 3%;
}

.clb_sc
{
	width: 30%;
	height: 100%;
	text-align: center;
	float: left;
	background-color: rgba(0,0,0,0.9);
	color: #FC0;
	font-size: 30px;
}

.clb_n
{
	width: 70%;
	height: 80%;
	text-align: left;
	background-color: rgba(0,0,0,0.9);
	color: #FF1A00;
	float: left;
	font-size: 30px;
}

#time
{
	font-size: 50px;
	color: #FC0;
	
	float: left;
	margin-left:3%; 

}

.n_row
{
	color: #FC0;
	background-color: rgba(0,0,0,0.7);
	width: 94%;
	margin-left: 3%;
	height: auto;
	margin-top: 2%;
	font-size: 20px;
}

.item
{
    background: #333;
	background-size:cover;    
   	text-align: center;
   	height: 100% !important;
}
	
.carousel
{
	width:100%;
	height:100%;
}
	
	.bs-example
{
	height:90%;
}

#gal
{
	margin-top: 10%;
	height: 70%;
	width: 80%;
	margin-left: 10%;
}

.players
{
	height: 40%;
	width: 15%;
	margin-left: 3%;
	margin-top: 2%;
	float: left;
}

.pla_pic
{
	background-size: cover;
	height: 70%;
	width: 100%;
	float: left;
}

.pla_inf
{
	background-color: rgba(0,0,0,0.5);
	color: #FC0;
	height: 30%;
	width: 100%;
	text-align:center;
	float: left;
}

.ad
{
	float: left;
	height: 100%;
	width: auto;
	font-family: "segoeUI B";
	margin-left: 2%;
	visibility: hidden;
}

#btn-sub
{
	background-color: #FC0;
	color: #000;
	border: none;
}

#pwrd
{
	color: #000;
}

</style>

</head>

<body>

	<div id="container">
		<div id="layer6" style="opacity:1;">
        	<div class="fix-bar">
        		<div class="bar-btn" id="index">HOME</div>
        		<div class="bar-btn" id="blog">BLOG</div>
        		<div class="bar-btn" id="l_n">LIVE & NEWS</div>
        		<div class="bar-btn" id="gall">GALLERY</div>
        		<div class="bar-btn" id="teamsheet">TEAM</div>
        		<div class="bar-btn" id="admin">ADMIN</div>
        		<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
                 <form action="" method="post">
        		<div class="ad">Access Code:<input type="password" id="pwrd" name="key"/>
        			<input id="btn-sub" type="submit" value="Login"/></div>
        	</div>
</form>
        	<div id="banner">FOOTBALL FEED</div>
        	
			<div class="col" style="margin-left:10%"><div class="quote" >"I learned all about life <br>with a ball at my feet" <br>        -Ronaldinho</div>        	
			<div class="quote" >"Thats the beauty of football, <br>sometimes it make you laugh, sometimes it make you cry"       -Guardiola</div>        	
			<div class="quote" >"Everything I know about morality and the obligations of men, I owe it to football"       -Albert Camus</div>        	
			</div>
			<div class="col"><div class="quote" >"True obsession doesnt end when season ends"       -Anonymous</div>        	
			<div class="quote" >"Champions are made from something deep inside them, a desire, a dream and a vision"       -Paul Scholes</div>        	
			<div class="quote" >"Five days shalt thou labour, as the Bible says. The seventh day is the Lord thy God's. The sixth is for football"       -Anthony Burgess</div>        	
			</div>
			<div class="col"><div class="quote" >"I once cried because I had no shoes to play football with my friends, but one day I saw a man who had no feet, and I realized how rich I am"       -Zinedine Zidane</div>        	
			<div class="quote" >"Its not about the size of the man in the fight, its about the size of the fight in the man"       -Ronaldo</div>        	
			<div class="quote" >"Good, better, best. Never let it rest. Until your good is better and your better is the best"       -David Beckham</div>        	
			</div>
			<div class="col"><div class="quote" >"Football players are not made for their technique, but made for their passion"       -Anonymous</div>        	
			<div class="quote" >"I cant believe it. I cant believe it, Football. Bloody Hell"       -Sir Alex Ferguson</div>        	
			<div class="quote" >"Hardwork will always overcome natural talent when natural talent does not work hard enough"       -Sir Alex Ferguson</div>        	</div>


		</div>

		<div id="layer5" style="opacity:0;">
			<div class="fix-bar">
        		<div class="bar-btn" id="index">INDEX</div>
        		<div class="bar-btn" id="blog">BLOG</div>
        		<div class="bar-btn" id="l_n">LIVE & NEWS</div>
        		<div class="bar-btn" id="gall">GALLERY</div>
        		<div class="bar-btn" id="teamsheet">TEAM</div>
        		<div class="bar-btn" id="admin">ADMIN</div>
        		<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
                <form action="" method="post">
        		<div class="ad">Access Code:<input type="password" id="pwrd" name="key"/><input id="btn-sub" type="submit" value="Login"/></div>
        	</div>
        </form>

			<div id="live">
				<span style="font-size:30px; margin-left:2%">LIVE</span>
				<br>
				<div id="time">FT</div>
				<?php
    $f=$_GET['id'];
    $data=$general->score($f);
    ?>
				<div class="clb_s">
					<div class="clb_n" ><span style="margin-left:2%"><?php echo $data['homename'];?></span></div>
					<div class="clb_sc"><?php echo $data['homescore'];?></div>
				</div>

				<div class="clb_s">
					<div class="clb_n" ><span style="margin-left:2%"><?php echo $data['oppname'];?></span></div>
					<div class="clb_sc"><?php echo $data['oppscore'];?></div>
				</div>
			</div>
			<div id="news">
				<span style="font-size:30px; margin-left:2%">NEWS UPDATE</span>
				<br>
				<?php
              $f=$_GET['id'];
              $data=$general->posts($f);
              foreach($data as $reach)
              {
              ?>
				<div class="n_row">TITLE:<?php echo $reach['postTitle'];?></div>
				<div class="n_row"><?php echo $reach['postDesc'];?></div>
				<div class="n_row"><?php echo $reach['postCont'];?></div>
				<div class="n_row">POSTED ON:<?php echo $reach['postDate'];?></div>
				<?php
			}?>
				<!--<div class="n_row">Neymar to run for 30 goal streak</div>
				<div class="n_row">Barca fans celebrate great victory with free drinks in nearby pub</div>
				<div class="n_row">Mascherano ,a constant push to catalan success</div>
				<div class="n_row">Messi brace keeps Barca on title race and Machester United scout keeps their eyes open towards the Barca star</div>-->
			</div>
		</div>

		<div id="layer4" style="opacity:0;">
			<div class="fix-bar">
        		<div class="bar-btn" id="index">INDEX</div>
        		<div class="bar-btn" id="blog">BLOG</div>
        		<div class="bar-btn" id="l_n">LIVE & NEWS</div>
        		<div class="bar-btn" id="gall">GALLERY</div>
        		<div class="bar-btn" id="teamsheet">TEAM</div>
        		<div class="bar-btn" id="admin">ADMIN</div>
        		<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
                <form action="" method="post">
        		<div class="ad">Access Code:<input type="password" id="pwrd" name="key"/><input id="btn-sub" type="submit" value="Login"/></div>
        	</div>
        </form>

			<div id="gal"><!--EXTERNAL CODE : GALLERY-->
			<div class="bs-example">
            
    		<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    	
     	  	<!-- Carousel items -->
        	<div class="carousel-inner">
            <div class="active item" style="background-image:url(../Res/badminton_1.jpg)">
            </div>
            <?php  
      $f = $_GET['id'];
      $images = $general->gallery($f);
      $i = 0;
      foreach($images as $reachs)
      {
?>
           <div class="item">
      <img src="../gallery/<?php echo $reachs['file_name'];?>" class="img-responsive">
    </div>
    <?php }?>
        	</div>
        	<!-- Carousel nav -->
        	<a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        	</a>
        	<a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        	</a>
    		</div>
			</div>
			</div>
		</div>

		<div id="layer3" style="opacity:0;">
			<div class="fix-bar">
        		<div class="bar-btn" id="index">INDEX</div>
        		<div class="bar-btn" id="blog">BLOG</div>
        		<div class="bar-btn" id="l_n">LIVE & NEWS</div>
        		<div class="bar-btn" id="gall">GALLERY</div>
        		<div class="bar-btn" id="teamsheet">TEAM</div>
        		<div class="bar-btn" id="admin">ADMIN</div>
        		<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>

                <form action="" method="post">
        		<div class="ad">Access Code:<input type="password" id="pwrd" name="key"/><input id="btn-sub" type="submit" value="Login"/></div>
        	</div>
</form>
			<span style="float:left; font-size:30px; color:#FC0; margin-top:10%; font-family:'segoeUI B'; margin-left:10%">TEAM</span>
			<br>
			<div id="team">
		
					<?php
  $f=$_GET['id'];
  $data = $general->member($f);
  foreach($data as $reach)
  {
  	?>
				<div class="players">

					<div class="pla_pic" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)"></div>
					<div class="pla_inf"><?php echo $reach['membername'];?><br> <?php echo $reach['pos'];?><br><?php echo $reach['dept'];?><br><?php echo $reach['aboutme'];?></div>

				</div>
			<?php }?>
			</div>
				
		</div>

	</div>

</body>

<script type="text/javascript">


var layer6=document.getElementById("layer6");
var layer5=document.getElementById("layer5");
var layer4=document.getElementById("layer4");
var layer3=document.getElementById("layer3");
var layer2=document.getElementById("layer2");

var ad0=document.getElementsByClassName("ad").item(0);
var ad1=document.getElementsByClassName("ad").item(1);
var ad2=document.getElementsByClassName("ad").item(2);
var ad3=document.getElementsByClassName("ad").item(3);

var current=layer6;
var stp;
var click;
document.getElementsByClassName("fix-bar").item(0).onclick=function(e){
	click=document.elementFromPoint(e.clientX,e.clientY);

	if(click.id.localeCompare("index")==0)
		{
			window.location.assign("../hpage.php")	;
		}

	if(click.id.localeCompare("blog")==0)
		{
			window.location.assign("../blogpage/bloghome.php")	;
		}

	if(click.id.localeCompare("l_n")==0)
		{

			clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer5.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer5.style.opacity)+0.03<1)
				{layer5.style.opacity=parseFloat(layer5.style.opacity)+0.03;	
				}
				else
				{
					layer5.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer5;
					fixbar=document.getElementsByClassName("fix-bar").item(1);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
		}

	if(click.id.localeCompare("gall")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer4.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer4.style.opacity)+0.03<1)
				{layer4.style.opacity=parseFloat(layer4.style.opacity)+0.03;	
				}
				else
				{
					layer4.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer4;
					fixbar=document.getElementsByClassName("fix-bar").item(2);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);	
		}

	if(click.id.localeCompare("teamsheet")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer3.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer3.style.opacity)+0.03<1)
				{layer3.style.opacity=parseFloat(layer3.style.opacity)+0.03;	
				}
				else
				{
					layer3.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					current=layer3;
					fixbar=document.getElementsByClassName("fix-bar").item(3);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);		
		}

	if(click.id.localeCompare("admin")==0)
		{
			if(ad0.style.visibility=="visible")
				ad0.style.visibility="hidden";
			else
				ad0.style.visibility="visible";
		}

		

};

document.getElementsByClassName("fix-bar").item(1).onclick=function(e){
	click=document.elementFromPoint(e.clientX,e.clientY);

	if(click.id.localeCompare("index")==0)
		{
			window.location.assign("../hpage.php")	;		
		}

	if(click.id.localeCompare("blog")==0)
		{
		window.location.assign("../blogpage/bloghome.php")	;	
		}

	if(click.id.localeCompare("l_n")==0)
		{

			clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer5.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer5.style.opacity)+0.03<1)
				{layer5.style.opacity=parseFloat(layer5.style.opacity)+0.03;	
				}
				else
				{
					layer5.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer5;
					fixbar=document.getElementsByClassName("fix-bar").item(1);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
		}

	if(click.id.localeCompare("gall")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer4.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer4.style.opacity)+0.03<1)
				{layer4.style.opacity=parseFloat(layer4.style.opacity)+0.03;	
				}
				else
				{
					layer4.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer4;
					fixbar=document.getElementsByClassName("fix-bar").item(2);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);	
		}

	if(click.id.localeCompare("teamsheet")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer3.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer3.style.opacity)+0.03<1)
				{layer3.style.opacity=parseFloat(layer3.style.opacity)+0.03;	
				}
				else
				{
					layer3.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					current=layer3;
					fixbar=document.getElementsByClassName("fix-bar").item(3);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);		
		}

	if(click.id.localeCompare("admin")==0)
		{
		if(ad1.style.visibility=="visible")
				ad1.style.visibility="hidden";
			else
				ad1.style.visibility="visible";	
		}

		

};

document.getElementsByClassName("fix-bar").item(2).onclick=function(e){
	click=document.elementFromPoint(e.clientX,e.clientY);

	if(click.id.localeCompare("index")==0)
		{
				window.location.assign("../hpage.php")	;
		}

	if(click.id.localeCompare("blog")==0)
		{
			window.location.assign("../blogpage/bloghome.php")	;
			
		}

	if(click.id.localeCompare("l_n")==0)
		{

			clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer5.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer5.style.opacity)+0.03<1)
				{layer5.style.opacity=parseFloat(layer5.style.opacity)+0.03;	
				}
				else
				{
					layer5.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer5;
					fixbar=document.getElementsByClassName("fix-bar").item(1);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
		}

	if(click.id.localeCompare("gall")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer4.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer4.style.opacity)+0.03<1)
				{layer4.style.opacity=parseFloat(layer4.style.opacity)+0.03;	
				}
				else
				{
					layer4.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer4;
					fixbar=document.getElementsByClassName("fix-bar").item(2);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);	
		}

	if(click.id.localeCompare("teamsheet")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer3.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer3.style.opacity)+0.03<1)
				{layer3.style.opacity=parseFloat(layer3.style.opacity)+0.03;	
				}
				else
				{
					layer3.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					current=layer3;
					fixbar=document.getElementsByClassName("fix-bar").item(3);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);		
		}

	if(click.id.localeCompare("admin")==0)
		{
			if(ad2.style.visibility=="visible")
				ad2.style.visibility="hidden";
			else
				ad2.style.visibility="visible";
		}

		

};

document.getElementsByClassName("fix-bar").item(3).onclick=function(e){
	click=document.elementFromPoint(e.clientX,e.clientY);

	if(click.id.localeCompare("index")==0)
		{
				window.location.assign("../hpage.php")	;
		}

	if(click.id.localeCompare("blog")==0)
		{
			window.location.assign("../blogpage/bloghome.php")	;
		}

	if(click.id.localeCompare("l_n")==0)
		{

			clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer5.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer5.style.opacity)+0.03<1)
				{layer5.style.opacity=parseFloat(layer5.style.opacity)+0.03;	
				}
				else
				{
					layer5.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer5;
					fixbar=document.getElementsByClassName("fix-bar").item(1);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
		}

	if(click.id.localeCompare("gall")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer4.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer4.style.opacity)+0.03<1)
				{layer4.style.opacity=parseFloat(layer4.style.opacity)+0.03;	
				}
				else
				{
					layer4.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer3.style.visibility="hidden";
					layer3.style.opacity=0;
					current=layer4;
					fixbar=document.getElementsByClassName("fix-bar").item(2);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);	
		}

	if(click.id.localeCompare("teamsheet")==0)
		{
		clearInterval(stp);
			stp=setInterval(function(){

			if(parseFloat(current.style.opacity)-0.03>0)
			{current.style.opacity=parseFloat(current.style.opacity)-0.03;	
			}
			else
			{
				
				current.style.visibility="hidden";
				current.style.opacity=0;
				clearInterval(stp);
				layer3.style.visibility="visible";
				stp=setInterval(function(){

				if(parseFloat(layer3.style.opacity)+0.03<1)
				{layer3.style.opacity=parseFloat(layer3.style.opacity)+0.03;	
				}
				else
				{
					layer3.style.opacity=1;
					layer6.style.visibility="hidden";
					layer6.style.opacity=0;
					layer5.style.visibility="hidden";
					layer5.style.opacity=0;
					layer4.style.visibility="hidden";
					layer4.style.opacity=0;
					current=layer3;
					fixbar=document.getElementsByClassName("fix-bar").item(3);
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);		
		}

	if(click.id.localeCompare("admin")==0)
		{
			if(ad3.style.visibility=="visible")
				ad3.style.visibility="hidden";
			else
				ad3.style.visibility="visible";
		}

		

};

</script>

</html>