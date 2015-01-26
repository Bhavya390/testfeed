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
			header('Location: edit_home.php');
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
<head></head>
<title>Football</title>
<style>
#container1
{
	height:100%;
	width:100%
}
#toptab
{
	height:8%;
	width:100%;
}
.tab_ele
{
	float:left;
	background-color:#CCC;
	opacity:0.5;
	height:100%;
	width:auot;
	margin-left:20px;
	padding:8px 8px 8px 8px;
	font-family:"Adobe Gothic Std B";
	color:#333;
}
.tab_ele_no
{
	float:left;
	background-color:#CCC;
	opacity:0.5;
	height:100%;
	width:auot;
	margin-left:20px;
	padding:8px 8px 8px 8px;
	font-family:"Adobe Gothic Std B";
	color:#333;
}
.tab_ele:hover
{
	-webkit-animation:zfac 2s;
	-webkit-animation-fill-mode:forwards;
}
@-webkit-keyframes zfac{
	0% {-webkit-transform:scale(1,1);
	    opacity:0.5;
		color:#333;}
	10% {-webkit-transform:scale(1.2,1.2);
	    opacity:0.75;
		background-color:#CCC;}
	40% {-webkit-transform:scale(1,1);
	      opacity:1.0;
		  color:#FFF;
		  background-color:#000;}
    100% {-webkit-transform:scale(1,1);
	      opacity:1.0;
		  color:#FFF;
		  background-color:#C00;}

}
#pics
{
	margin-left:1.5%;
	margin-top:1.5%;
	border-style:solid;
	border-color:#FFF;
	border-width:2%;
	float:left;
	width:30%;
	height:84%;
	font-family:"Adobe Gothic Std B";
	color:#FFF;
	font-weight:bold;
	font-size:16px;
}

#pics:hover .pic_cir
{
	-webkit-animation:pic_func 1s;
	-webkit-animation-fill-mode:forwards;
}

@-webkit-keyframes pic_func
{
	0% { -webkit-transform:scale(1,1)}
	25% { -webkit-transform:scale(1.2,1.2)}
	50% { -webkit-transform:scale(1,1)}
	100% { -webkit-transform:scale(1,1)}
}

#news
{
	
	margin-left:1.5%;
	margin-top:1.5%;
	border-style:solid;
	border-color:#FFF;
	border-width:2%;
	float:left;
	width:28%;
	height:84%;
	font-family:"Adobe Gothic Std B";
	color:#FFF;
	font-weight:bold;
	font-size:16px;
}

#news:hover
{
	background-image:url(Res/trans_w.png);
}
#news:hover p
{
	color:#000;
}


#live
{
	margin-left:1.5%;
	margin-top:1.5%;
	border-style:solid;
	border-color:#FFF;
	border-width:2%;
	float:left;
	width:35.5%;
	height:84%;
	font-family:"Adobe Gothic Std B";
	color:#FFF;
	font-weight:bold;
	font-size:16px;
}

#live:hover
{
	background-image:url(Res/trans_w.png);
	color:#000;
}

#live:hover .away
{
	background-color:#000;
}

#live:hover 
{
	-webkit-animation:p_func 1s;
	-webkit-animation-fill-mode:forwards;
}

@-webkit-keyframes p_func
{
	0% { -webkit-transform:scale(1,1)}
	25% { -webkit-transform:scale(1.05,1.05)}
	50% { -webkit-transform:scale(1,1)}
	100% { -webkit-transform:scale(1,1)}
}

.pic_cir
{
	background-color:#FFF;
	float:left;
	height:13%;
	width:18%;
	margin-left:4%;
	margin-bottom:1%;
	z-index:-1;
}
.pic_cir:hover
{
	-webkit-animation:picfac 2s;
	-webkit-animation-fill-mode:forwards;
	z-index:100;
	position:absolute;
	left:0px;
}
@-webkit-keyframes picfac{
	0% {}
	100%{z-index:100;
	background-color:#FFF;
	height:39%;
	width:28%;
	left:0px;
	margin-left:3%;
	margin-bottom:3%;
}
}

.news_ele
{
	width:93.5%;
	height:8%;
	background-size:cover;
	margin-left:3%;
	margin-bottom:3%;
}

.news_ele:hover
{
	-webkit-animation:glw 2s;
	-webkit-animation-fill-mode:forwards;
}

@-webkit-keyframes glw
{
	0% {}
	100% {background-color:#000};
}

.bar
{
	height:5%;
	margin-left:3%;
}

#shot_home
{
	background-color:#F00;
	width:70%;
}

#shot_away
{
	width:10%;
}

#pos_away
{
	width:55%;
}

#pos_home
{
	background-color:#F00;
	width:45%;
}
#cor_away
{
	width:30%;
}

#cor_home
{
	background-color:#F00;
	width:80%;
}
#fol_away
{
	width:67%;
}

#fol_home
{
	background-color:#F00;
	width:13%;
}

.away
{
	background-color:#FFF;
	height:5%;
	margin-left:3%;
}



</style>


<body background="Res/football.jpg">
<div id="container1">
  
  <div id="toptab">
   <a href="../SFEED_DELTA/" style="text-decoration:none"><div class="tab_ele" style="background-color:#9F0; color:#FFF; opacity:0.9">INDEX</div></a>
   <a href="team_C.php" style="text-decoration:none"><div class="tab_ele">TEAM</div></a>
   <a href="comp_stat.php" style="text-decoration:none"><div class="tab_ele">COMPETITIONS</div></a>
   <a href="comp_stat.php" style="text-decoration:none"><div class="tab_ele">ACHIEVEMENTS</div></a>
   <a href="comp_stat.php" style="text-decoration:none"><div class="tab_ele">ADMIN</div></a>
   <div class="tab_ele_no" style="width:55.6%"></div>
  </div>
  
  <div id="pics" >
   <p style="margin-left:4%;"> DAYS OF GLORY</p>
   <div class="pic_cir"; style=" background-image:url(Res/130603214439-football-neymar-barcelona-story-top.jpg);background-size:cover;"></div>
   <div class="pic_cir"; style=" background-image:url(Res/Break-in-football-boots.jpg); background-size:cover;"></div>
   <div class="pic_cir"; style=" background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg); background-size:cover;"></div>
  </div>
  
  <div id="live" >
  <p style="margin-left:3%">LIVE</p>
  <p style="font-size:50px; margin-left:5%; margin-top:0%">NITT</p>
  <p style="font-size:50px; margin-top:-24%; margin-left:80%">3</p>
  <p style="font-size:50px; margin-left:5%; margin-top:-10%">Sasthra</p>
  <p style="font-size:50px; margin-top:-24%; margin-left:80%">1</p>
  <p style="margin-top:-10%; margin-left:3%">SHOTS</p>
  <div id="shot_home" class="bar" style="margin-top:-2%"></div>
  <div id="shot_away" class="away"></div>
  <p style="margin-top:2%; margin-left:3%">POSSESSION</p>
  <div id="pos_home" class="bar" style="margin-top:-2%"></div>
  <div id="pos_away" class="away"></div>
  <p style="margin-top:2%; margin-left:3%">CORNERS</p>
  <div id="cor_home" class="bar" style="margin-top:-2%"></div>
  <div id="cor_away" class="away"></div>
  <p style="margin-top:2%; margin-left:3%">FOULS</p>
  <div id="fol_home" class="bar" style="margin-top:-2%"></div>
  <div id="fol_away" class="away"></div>
  
  <p style="margin-left:90%; margin-top:-106%">36'</p>
  
  
  
  </div>
    
  <div id="news" >
  <p style="margin-left:3%">LATEST UPDATES</p>
    <div class="news_ele">
    <p id="news_hdline" style="margin-top:2%">DIAMOND HOSTEL WINS THE AAVEG FOOTBALL CUP</p>
    <p id="news_date" style=" margin-top:-2%; font-size:12px; float:right">26th Aug 2014</p>
    </div>
    
    <div class="news_more" style="height:3%; margin-top:-2%">
    <p id="news_hdline" style="margin-top:7%; float:right; margin-right:-18.5%;">MORE >></p>
    </div>
  </div>
  
 
  
 <a name="login">
  <div id="admin" >
<p style="margin-left:3%">ADMIN ACCESS</p>
	<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
  
   <form action="" method="post" target="">
  <p style="margin-left:3%">ACCESS KEY :
  <input type="text" name="key"/></p>
  <input class="email_btn" name="submit" type="submit" value="Done" />
  </form>
  </div>
  </div>
</a>
  
</div>
</body>

</html>
