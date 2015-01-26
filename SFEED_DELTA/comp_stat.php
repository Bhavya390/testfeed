<html>
<title>SFEED</title>
<head></head>

<style>

#toptab
{
	height:8%;
	width:100%;
}

.boxs
{
	
	margin-left:1.5%;
	margin-top:1.5%;
	border-style:solid;
	border-color:#FFF;
	border-width:2%;
	float:left;
	width:40%;
	height:54%;
	font-family:"Adobe Gothic Std B";
	color:#FFF;
	font-weight:bold;
	font-size:16px;
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

.heading
{
	font-size:36px;
	font-weight:bold;
	position:fixed;
	color:#FFF;
	margin-top:0.75%;
	margin-left:1%;
	
}
.cups
{
	margin-top:2%;
	height:100%;
	width:25%;
	float:left;
}
.cup_num
{
	margin-top:90%;
	margin-left:50%;
	font-size:18px;
	font-weight:bolder;
}
.u_p
{
	font-size:24px;
	margin-left:3%;
}
#SnIn
{
	font-family:"Adobe Gothic Std B";
	font-size:16px;
	background-color:#F00;
	color:#FFF;
	border:none;
	height:13%;
	margin-left:3%;
}
</style>



<body background="Res/football.jpg">
  <div id="container3">
   <div id="toptab">
    <a href="homepage.php" style="text-decoration:none"><div class="tab_ele">INDEX</div></a>
    <a href="team_C.php" style="text-decoration:none"><div class="tab_ele">TEAM</div></a>
    <div class="tab_ele" style="background-color:#9F0; color:#FFF; opacity:0.9">ACHIEVEMENTS</div>
    <div class="tab_ele">ADMIN</div>
    <div class="tab_ele_no" style="width:40%"></div>
   </div>
  
  <div class="boxs">
  <p class="heading">HISTORY</p> 
  <p style="margin-top:15%; margin-left:2%; margin-right:2%">It started in the year of 1995. The first game was played at Karo ground, which then later was renovated and named as NSO ground. Over the years the conditions changed various developements were brought and court was converted to a level sand court with the financial help from the govt.Suppose that V is an n-dimensional vector space over R. Then any basis for V consists of exactly n
linearly independent vectors in V . Suppose now that we have a set of n linearly independent vectors
in V . Will this form a basis for V ?It started in the year of 1995. The first game was played at Karo ground, which then later was renovated and named as NSO ground. Over the years the conditions change</p>
  </div>
  
  <div class="boxs" style="width:25%; height:84%">
  <p class="heading">COMPETITIONS</p> 
    
  </div>
  
  <div class="boxs" style="width:28.5%; height:42%">
  <p class="heading">CONTACT</p> 
  </div>
  
  <div class="boxs" style="width:28.5%; height:38%; border-color:#000; background-color:#000;">
  <p class="heading" style="background-color:#000;">ADMIN ACCESS</p> 
  
  <p class="u_p" style="margin-top:20%"> PASSWORD :</p><input type="password" id="pwrd" name="pwrd" style="margin-top:-13%; margin-left:40%;  width:55%">
  <input type="submit" value="SignIn" id="SnIn">
  </div>
  
  <div class="boxs" style="height:26%; margin-top:-12.5%; background-color:#090;">
  <p class="heading">CUPS</p>
    <div class="cups" style="margin-left:25%; background-image:url(Res/cup-1.png)"><p class="cup_num">x2</p></div>
    <div class="cups" style="background-image:url(Res/cup-2.png);"><p class="cup_num">x1</p></div>
    <div class="cups" style="background-image:url(Res/cup-3.png);"><p class="cup_num">x10</p></div>
  </div> 
  
  
  
  
  
  
  
  </div>
</body>
</html>