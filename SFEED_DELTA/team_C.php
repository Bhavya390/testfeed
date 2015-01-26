<html>
<head></head>
<title>Football</title>
<style>
#container2
{
	height:100%;
	width:100%
}
.box
{
	overflow:scroll;
	overflow-x:hidden;
	margin-left:1.5%;
	margin-top:1.5%;
	border-style:solid;
	border-color:#FFF;
	border-width:2%;
	float:left;
	font-family:"Adobe Gothic Std B";
	color:#FFF;
	font-weight:bold;
	font-size:16px;
	height:93%;
	width:96.5%;
}

.player
{
	float:left;
	height:30%;
	width:20%;
	margin-left:4%;
	margin-top:4%;
}

.player:hover
{
	-webkit-animation:pla_z 1s;
	-webkit-animation-fill-mode:forwards;
}

.player:hover .inner
{
	-webkit-animation:pla_z 1s;
	-webkit-animation-fill-mode:forwards;
	background-color:#F00;
}


@-webkit-keyframes pla_z
{
	0% { -webkit-transform:scale(1,1)}
	25% { -webkit-transform:scale(1.1,1.1)}
	
	100% { -webkit-transform:scale(1,1)}
}

.imgbox
{
	height:70%;
	width:45%;
	background-size:cover;
}
.inner
{
	background-color:#000;
	height:30%;
	width:100%;
}
</style>


<body background="Res/football.jpg">
<div id="container2">
   <div class="box">
     <p style="margin-left:2%">TEAM SHEET</p>
     <div class="player">
       <div class="inner">
         <p style="margin-top:10%; margin-left:5%;">Alester Fraser</p>
         <p style="margin-top:-3%; margin-left:5%;">Civil</p>
         <p style="margin-top:-13.5%; margin-left:35%;">19</p>
         <p style="margin-top:-15%; margin-left:90%">ST</p>
       </div>
       <div class="imgbox" style="background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg)"></div>
     </div>
     
     <div class="player">
       <div class="inner" >
         <p style="margin-top:10%; margin-left:5%;">Alester Fraser</p>
         <p style="margin-top:-3%; margin-left:5%;">Civil</p>
         <p style="margin-top:-13.5%; margin-left:35%;">19</p>
         <p style="margin-top:-15%; margin-left:90%">ST</p>
       </div>
       <div class="imgbox" style="background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg)"></div>
     </div>
     
     <div class="player">
       <div class="inner" >
         <p style="margin-top:10%; margin-left:5%;">Alester Fraser</p>
         <p style="margin-top:-3%; margin-left:5%;">Civil</p>
         <p style="margin-top:-13.5%; margin-left:35%;">19</p>
         <p style="margin-top:-15%; margin-left:90%">ST</p>
       </div>
       <div class="imgbox" style="background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg)"></div>
     </div>
     
     <div class="player">
       <div class="inner" >
         <p style="margin-top:10%; margin-left:5%;">Alester Fraser</p>
         <p style="margin-top:-3%; margin-left:5%;">Civil</p>
         <p style="margin-top:-13.5%; margin-left:35%;">19</p>
         <p style="margin-top:-15%; margin-left:90%">ST</p>
       </div>
       <div class="imgbox" style="background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg)"></div>
     </div>
     
      <div class="player">
       <div class="inner" >
         <p style="margin-top:10%; margin-left:5%;">Alester Fraser</p>
         <p style="margin-top:-3%; margin-left:5%;">Civil</p>
         <p style="margin-top:-13.5%; margin-left:35%;">19</p>
         <p style="margin-top:-15%; margin-left:90%">ST</p>
       </div>
       <div class="imgbox" style="background-image:url(Res/Jordi-Roura-121107-Smiling-R-300.jpg)"></div>
     </div>
     
     
   </div> 
</div>
</body>

</html>