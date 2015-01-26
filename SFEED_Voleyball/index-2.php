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

<title>Volleyball</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 

<style>

@font-face
{
	font-family:"high School USA Sans";
	src:url(../HighSchoolUSASans.ttf); 
}

body{
	padding:0;
	margin:0;
	background:url(../Res/vb.jpg) no-repeat fixed;
	background-size:cover;
	
}

#main_cont
{
	height:auto;
	width:100%;
	font-family:"high School USA Sans";
}

#s_1
{
	height:700px;
	width:100%;
	background-color:#000;
	text-align:center;
	color:#FFF;
	float:left;
}

#img_map
{
	height:320px;
	width:640px;
	position:relative;
	margin:0 auto;
	cursor:pointer;
}

#p1
{
	z-index:0;
	opacity:0.2;
}

#p2
{
	z-index:30;
	opacity:0.2;
}


#p3
{
	z-index:40;
	opacity:0.2;
}


#p4
{
	z-index:50;	
	opacity:0.2;
}

.img_cl
{
	height:100%;
	width:100%;
	position:absolute;
	background-size:contain;
}

#map_loc
{
	margin:0 auto;
	width:640px;
	text-align:left;
}

#map_loc span
{
	opacity:0;
}

.btn
{
	border:none;
	background-color:#FFF;
	color:#000;
	font-family:"high School USA Sans";
}

#gal
{
	float:left;
	width:80%;
	height:400px;
	margin-left:10%;
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
	height:400px;
}

#newsnlive
{
	height:auto;
	margin-left:10%;
	float:left;
	background-color:rgba(0,0,0,0.5);
	color:#FFF;
	width:80%;
	text-align:center;
}

.box
{
	font-size:36px;
	text-align:center;
	height:50px;
	width:25%;
	float:left;
}

.news_box
{
	font-size:20px;
	text-align:left;
	height:auto;
	width:45%;
	float:left;
	margin-left:5%;
	margin-top:2%;
	background-color:rgba(0,0,0,0.9);
	color:#FFF;
	padding-left:1%;
}

#live_ban
{
	width:100%;
	text-align:center;
	font-size:36px;
}

#team_ban
{
	width:100%;
	text-align:center;
	font-size:36px;
}

#news_ban
{
	width:100%;
	text-align:center;
	font-size:36px;
}

.player
{
	height:auto;
	width:20%;
	background-color:rgba(0,0,0,0.8);
	float:left;
	margin-left:4%;
	margin-top:20px;
}

.pla_pic
{
	background-size:cover;
	height:150px;
	width:100%;
	float:left;
}

.pla_det
{
	font-size:12px;
	font-weight:500;
	text-align:center;
	width:100%;
	color:#FFF;
}

#team
{
	float:left;
	height:auto;
	width:80%;
	margin-left:10%;
	color:#FFF;
	text-align:center;
	background-color:rgba(0,0,0,0.5);
}

</style>

</head>

<body>

<div id="main_cont">
	<div id="s_1">
    </br>
    <div style="height:8%"><span id="bar" style="float:right; margin-right:2%; cursor:pointer; color:rgba(255,255,255,0.4)">ADMIN</span><a href="../blogpage/bloghome.php"><span id="bar" style="float:right; margin-right:2%; cursor:pointer; color:rgba(255,255,255,0.4)">BLOG</span></a><a href="../hpage.php"><span id="bar" style="float:right; margin-right:2%; cursor:pointer; color:rgba(255,255,255,0.4)">HOME</span></a></br>
    <span id="admin" style="float:right; margin-right:2%; visibility:hidden">ACCESS CODE:
    	<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p style="color:blue">', $errors) . '</p>';

                }
                ?>
    	<form action="" method="post">
    	<input type="password" name="key" id="admin"/>
    	<input type="submit" value="Go!" class="btn"/></span>
    </form>
    </div>
    
    <div id="img_map">
    	<div id="p1" class="img_cl" style="background-image:url(../Res/p-1.png); opacity:0.2;"></div>
    	<div id="p2" class="img_cl" style="background-image:url(../Res/p-2.png); opacity:0.2;"></div>
    	<div id="p3" class="img_cl" style="background-image:url(../Res/p-3.png); opacity:0.2;"></div>
    	<div id="p4" class="img_cl" style="background-image:url(../Res/p-4.png); opacity:0.2;"></div>
    </div>
    <div id="map_loc">
    <span id="m1" style="margin-left:130px; opacity:0.0;">LIVE</span>
    <span id="m2" style="margin-left:90px; opacity:0.0;">NEWS</span>
    <span id="m3" style="margin-left:15px; opacity:0.0;">GALLERY</span>
    <span id="m4" style="margin-left:20px; opacity:0.0;">TEAM</span>
    </div>
    <span style="font-size:200px;">VOLLEYBALL</span>
    </div>
    
    <div id="gal">
     	         <div class="bs-example">
                <!--EXTERNAL CODE : GALLERY-->
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    	
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item" style="background-image:url(../Res/badminton_1.jpg)">
            </div>
            
            <div class="item" style="background-image:url(../Res/Doa_and.jpg)">
            </div>
            
            <div class="item" style="background-image:url(../Res/football.jpg)">    
            </div>
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
    
    <div id="newsnlive">
    <div style="width:100%">
    	<?php
    $f=$_GET['id'];
    $data=$general->score($f);
    ?>
    <span id="live_ban" style="text-align:center;">LIVE 36'</span></div>
    </br></br></br>
   	<div class="box"><?php echo $data['homename'] ;?></div>
    <div class="box"><span style="background-color:#000; float:right;"><?php echo $data['homescore']; ?>:</span></div>
    <div class="box"><span style="background-color:#000; float:left;"><?php echo $data['oppscore'];?></span></div>
    <div class="box"><?php echo $data['oppname'];?></div>
   	</br></br></br></br></br></br>
    <span id="news_ban" style="text-align:center;">NEWS</span>
    </br></br></br>
    <?php
              $f=$_GET['id'];
              $data=$general->posts($f);
              foreach($data as $reach)
              {
              	?>
    <div class="news_box"><?php echo $reach['postTitle'];?> : <p><?php echo $reach['postDate']?></p> </div>
   <?php
}?>
    
    </div>
    
    <div id="team">
    </br></br></br></br></br></br>
    <span id="team_ban">TEAM</span>
    </br></br></br></br>
     <?php
  $f=$_GET['id'];
  $data = $general->member($f);
  foreach($data as $reach)
  {
    	echo "<div class='player'>";
    	?>
        <div class="pla_pic" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)"></div>
        <div class="pla_det"> <?php echo $reach['membername'];?></br><?php echo $reach['dept'];?></br><?php echo $reach['pos'];?></div>
    	</div>
        <?php
    }?>
       <!-- <div class="player">
        <div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>
        <div class="pla_det"> Alester Fraser Lyngdoh</br>103113018</div>
    	</div>
        
        <div class="player">
        <div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>
        <div class="pla_det"> Alester Fraser Lyngdoh</br>103113018</div>
    	</div>
        
        <div class="player">
        <div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>
        <div class="pla_det"> Alester Fraser Lyngdoh</br>103113018</div>
    	</div>
        
        <div class="player">
        <div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>
        <div class="pla_det"> Alester Fraser Lyngdoh</br>103113018</div>
    	</div>
        
        <div class="player">
        <div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>
        <div class="pla_det"> Alester Fraser Lyngdoh</br>103113018</div>
    	</div>-->
    </div>
    
    </div>
        
</div>

</body>

<script>

var p1=document.getElementById("p1");
var p2=document.getElementById("p2");
var p3=document.getElementById("p3");
var p4=document.getElementById("p4");

var m1=document.getElementById("m1");
var m2=document.getElementById("m2");
var m3=document.getElementById("m3");
var m4=document.getElementById("m4");

var bar=document.getElementById("bar");
var admin=document.getElementById("admin");

var map=document.getElementById("img_map");
var stp;
var f1,f2,f3,f4;
f1=0;
f2=0;
f3=0;
f4=0;

var xv;
var yv;

bar.onclick=function(){
	if(admin.style.visibility=="hidden")
	admin.style.visibility="visible";
	else
	admin.style.visibility="hidden";
};

document.body.onmousemove=function(e){
	xv=e.clientX;
	yv=e.clientY;
}

map.onmousemove=function(){
	
	if(!f1 && (xv>map.offsetLeft+87) && (xv<map.offsetLeft+226))
	{
		f1=1;
		clearInterval(stp);
		p2.style.opacity=0.2;
		p3.style.opacity=0.2;
		p4.style.opacity=0.2;

		f2=0;
		f3=0;
		f4=0;
		
		m2.style.opacity=0;
		m3.style.opacity=0;
		m4.style.opacity=0;


		stp=setInterval(function(){
			if(parseFloat(p1.style.opacity)+0.0016<1)
			{p1.style.opacity=parseFloat(p1.style.opacity)+0.0016;	
			m1.style.opacity=parseFloat(m1.style.opacity)+0.002;	}
		},1)
	}
	
	if(!f2 && (xv>map.offsetLeft+226) && (xv<map.offsetLeft+313))
	{
		f2=1;
		clearInterval(stp);
		p1.style.opacity=0.2;
		p3.style.opacity=0.2;
		p4.style.opacity=0.2;
		
		f1=0;
		f3=0;
		f4=0;
		
		m1.style.opacity=0;
		m3.style.opacity=0;
		m4.style.opacity=0;


		stp=setInterval(function(){
			if(parseFloat(p2.style.opacity)+0.0016<1)
			{p2.style.opacity=parseFloat(p2.style.opacity)+0.0016;	
			m2.style.opacity=parseFloat(m2.style.opacity)+0.002;	}
		},1)
	}
	
	if(!f3 && (xv>map.offsetLeft+313) && (xv<map.offsetLeft+373))
	{
		f3=1;
		clearInterval(stp);
		p1.style.opacity=0.2;
		p2.style.opacity=0.2;
		p4.style.opacity=0.2;
		
		f1=0;
		f2=0;
		f4=0;
		
		m1.style.opacity=0;
		m2.style.opacity=0;
		m4.style.opacity=0;


		stp=setInterval(function(){
			if(parseFloat(p3.style.opacity)+0.0016<1)
			{p3.style.opacity=parseFloat(p3.style.opacity)+0.0016;	
			m3.style.opacity=parseFloat(m3.style.opacity)+0.002;	}
		},1)
	}
	
	if(!f4 && (xv>map.offsetLeft+374) && (xv<map.offsetLeft+449))
	{
		f4=1;
		clearInterval(stp);
		p2.style.opacity=0.2;
		p3.style.opacity=0.2;
		p1.style.opacity=0.2;
		
		f2=0;
		f3=0;
		f1=0;
		
		m2.style.opacity=0;
		m3.style.opacity=0;
		m1.style.opacity=0;

		stp=setInterval(function(){
			if(parseFloat(p4.style.opacity)+0.0016<1)
			{p4.style.opacity=parseFloat(p4.style.opacity)+0.0016;	
			m4.style.opacity=parseFloat(m4.style.opacity)+0.002;	}
		},1)
	}
	
	if((xv<map.offsetLeft+87) || (xv>map.offsetLeft+449))
	{
		clearInterval(stp);
		f1=0;
		f2=0;
		f3=0;
		f4=0;
		
		p1.style.opacity=0.2;
		p2.style.opacity=0.2;
		p3.style.opacity=0.2;
		p4.style.opacity=0.2;
		
		m1.style.opacity=0;
		m2.style.opacity=0;
		m3.style.opacity=0;
		m4.style.opacity=0;
	}
};

var gallery=document.getElementById("gal");
var live=document.getElementById("live_ban");
var news=document.getElementById("news_ban");
var team=document.getElementById("team_ban");

map.onclick=function(){
	
	if((xv>map.offsetLeft+87) && (xv<map.offsetLeft+226))
	{
		window.scrollTo(0,live.offsetTop);
	}
	
	if((xv>map.offsetLeft+226) && (xv<map.offsetLeft+313))
	{
		window.scrollTo(0,news.offsetTop);
	}
	
	if((xv>map.offsetLeft+313) && (xv<map.offsetLeft+373))
	{
		window.scrollTo(0,gallery.offsetTop);
	}
	
	if((xv>map.offsetLeft+374) && (xv<map.offsetLeft+449))
	{
		window.scrollTo(0,team.offsetTop);
	}
};


map.onmouseout=function(){
		clearInterval(stp);
		f1=0;
		f2=0;
		f3=0;
		f4=0;
		
		p1.style.opacity=0.2;
		p2.style.opacity=0.2;
		p3.style.opacity=0.2;
		p4.style.opacity=0.2;
		
		m1.style.opacity=0;
		m2.style.opacity=0;
		m3.style.opacity=0;
		m4.style.opacity=0;
};

</script>

</html>