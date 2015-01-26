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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Cricket Team of NIT Trichy</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="functions.js"></script>
<link rel="stylesheet" href="flipclock.css">
<link rel="stylesheet" href="flipclock.min.js">

<style type="text/css">

a.back{
                background:transparent url(back.png) no-repeat top left;
                position:fixed;
                z-index: 7;
                width:150px;
                height:27px;
                outline:none;
                top:0px;
                left:0px;
            }

@import url(http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light);
html,body{height:100%;}
*{outline:none;}
body{margin:0px; padding:0px; background:#000;}
#toolbar{position:fixed; z-index:3; right:10px; top:10px; padding:5px; background:url(fs_img_g_bg.png);}
#toolbar img{border:none;}
#bg{position:fixed; z-index:1; overflow:hidden; width:100%; height:100%;}
#bgimg{display:none; -ms-interpolation-mode: bicubic;}
#preloader{position:relative; z-index:3; width:32px; padding:20px; top:80px; margin:auto; background:#000;}
#thumbnails_wrapper{z-index:2; position:fixed; bottom:0; width:100%; background:url(empty.gif); /* stupid ie needs a background value to understand hover area */}
#outer_container{position:relative; padding:0; width:100%; margin:40px auto;}
#outer_container .thumbScroller{position:relative; overflow:hidden; background:url(fs_img_g_bg.png);}
#outer_container .thumbScroller, #outer_container .thumbScroller .container, #outer_container .thumbScroller .content{height:170px;}
#outer_container .thumbScroller .container{position:relative; left:0;}
#outer_container .thumbScroller .content{float:left;}
#outer_container .thumbScroller .content div{margin:5px; height:100%;}
#outer_container .thumbScroller img{border:5px solid #fff;}
#outer_container .thumbScroller .content div a{display:block; padding:5px;}

.nextImageBtn, .prevImageBtn{display:block; position:absolute; width:50px; height:50px; top:50%; margin:-25px 10px 0 10px; z-index:3; filter:alpha(opacity=40); -moz-opacity:0.4; -khtml-opacity:0.4; opacity:0.4;}
.nextImageBtn:hover,.prevImageBtn:hover{filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity:0.8; opacity:0.8;}
.nextImageBtn{right:0; background:#000 url(nextImgBtn.png) center center no-repeat;}
.prevImageBtn{background:#000 url(prevImgBtn.png) center center no-repeat;}
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#nav > div').hover(
                function () {
                    var $this = $(this);
                    $this.find('img').stop().animate({
                        'width'     :'199px',
                        'height'    :'199px',
                        'top'       :'-25px',
                        'left'      :'-25px',
                        'opacity'   :'1.0'
                    },500,'easeOutBack',function(){
                        $(this).parent().find('ul').fadeIn(700);
                    });

                    $this.find('a:first,h2').addClass('active');
                },
                function () {
                    var $this = $(this);
                    $this.find('ul').fadeOut(500);
                    $this.find('img').stop().animate({
                        'width'     :'52px',
                        'height'    :'52px',
                        'top'       :'0px',
                        'left'      :'0px',
                        'opacity'   :'0.5'
                    },5000,'easeOutBack');

                    $this.find('a:first,h2').removeClass('active');
                }
            );
            });
        </script>
</head>
<body>
        <a class="back" href="../hpage.php"></a>
        <div id="bg"><a href="#" class="nextImageBtn" title="next"></a><a href="#" class="prevImageBtn" title="previous"></a><img src="images/Universe_and_planets_digital_art_wallpaper_denebola.jpg" width="1680" height="1050" alt="Denebola" id="bgimg" /></div>
<div id="preloader"><img src="ajax-loader_dark.gif" width="32" height="32" /></div>
<div id="img_title"></div>
<div class="menu">
<a name="home"></a>
    <div class="navigation" id="nav">
                <div class="item user" id="one">
                    <img src="images/bg_user.png" alt="" width="199" height="199" class="circle"/>
                    <h2>Admin</h2>
                    <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
                    <ul>

                        <li onclick="login()">Login</a></li>

            <form action="" method="post" target="">
		        <input type="password" class="email_field" name="key" size="18" placeholder="Enter Key"  />
		        <input type="hidden" value="sicanstudios" name="uri"/>
		        <input type="hidden" name="loc" value="en_US"/>
		        <input class="email_btn" name="submit" type="submit" value="GO"/>
	      	</form>
                    </ul>
                </div>
                <div class="item home" id="two">
                    <img src="images/bg_home.png" alt="" width="199" height="199" class="circle"/>
                    <h2 onclick="home()">Home</h2>
                </div>
                <div class="item shop" id="three">
                    <img src="images/bg_shop.png" alt="" width="199" height="199" class="circle"/>
                    <h2 onclick="team()">Team</h2>
                    
                </div>
                <div class="item camera" id="four">
                    <img src="images/bg_camera.png" alt="" width="199" height="199" class="circle"/>
                    <h2 onclick="live()">Live</h2>
                    
                </div>
                <div class="item fav" id="five">
                    <img src="images/bg_fav.png" alt="" width="199" height="199" class="circle"/>
                    <h2 onclick="location.href = '../blogpage/bloghome.php'">Blog</h2>
                    
                </div>
    </div>
</div>

<div class="scoreboard" style="display:none; background-color: gray; width: 1200px; opacity: 0.8; position: absolute; z-index:7; left: 50px; top: 100px;">
	<a name="matches"></a>
	<table>
	<td>
        <?php
    $f=$_GET['id'];
    $data=$general->cricscore($f);
    $array = explode(" ",$data['postCont']);
    $i=0;
    foreach ($array as $reach) {
    $a[$i] = $reach;
    $i=$i+1;
    }
    ?>
	    <h2 style="text-align:center;"><?php echo $a[0];?></h2>
	    <!--<div class="clock"></div>
	      <div class="counter">
	        <button type="button" class="increment">+1</button>
	      	<button type="button" class="decrement">-1</button>
	      	<button type="button" class="reset">Reset</button>
	    	</div>-->

		    <div style="position:relative; display:inline-block; top:0px; margin-right:40px;">
	      	<h3>Runs : <?php echo $a[1];?></h3>	
	      	<h3>Wickets : <?php echo $a[2];?></h3>
		    </div>
		<div style="position:relative; display:inline-block; top:0px;">
		
		<h3>To Win :<?php echo $a[3];?></h3>
		</div>
	</td>
	<td>
	    <h2><?php echo $a[4];?></h2>
		<!--<div class="clock2"></div>
		<div class="counter">
		<button type="button" class="increment2">+1</button>
		<button type="button" class="decrement2">-1</button>
		<button type="button" class="reset2">Reset</button>
		</div>-->
		<div style="position:relative; display:inline-block; top:0px; margin-right:40px;">	
		<h3>Runs : <?php echo $a[5];?></h3>
		<h3>Wickets : <?php echo $a[6];?></h3>
		</div>
		<div style="position:relative; display:inline-block; top:0px;">
		
		<h3>To Win :<?php echo $a[7];?></h3>
		</div>
	</td>
	</table>
<div>

	<!--<div class="statistics">
			<h2>STATISTICS</h2>
				<h4>Games Played</h2>
				<h4>Games Won</h2>
				<h4>Games Lost</h2>


	</div>-->

	<div class="updates" style="overflow:auto">
	<h2>UPDATES</h2>
	<ul style="list-style-type: none; ">
		<li style="text-align:left;">
		
    		<tr>
      <?php 
      $f = $_GET['id'];
      $data = $general->posts($f);
      foreach($data as $reach)
      {
      ?>
    <div class='news_ele'>
    <p id='news_hdline' style='margin-top:2%;'><h3><?php echo $reach['postTitle'];?></h3></p>
    <p id='news_desc' style='margin-top:-2%; font-size:12px; float:left;'><?php echo $reach['postDesc'];?></p>
    <p id='news_date' style='margin-top:-2%; font-size:12px; float:right;'><?php echo $reach['postDate'];?></p>
    </br>
    </div>
    <?php
}
?>
	</tr>
	
		</li>
	</ul>
	</div>

</div>
</div>
<style>
	.statistics{
		border-style: ridge;
		border-color: black;
		color: white;
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
		border-radius: 5px;
		margin-right: 40px;
		margin-top: 25px;
		display: inline-block;
		float: left;
		width: 750px;
		height: 420px;
		text-align: center;
		background: black;
		position: relative;
		left: 20px;
	}
	.updates{
		border-style: ridge;
		border-color: black;
		color: white;
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
		border-radius: 5px;
		margin-right: 40px;
		margin-top: 25px;
		display: inline-block;
		float: right;
		width: 350px;
		height: 420px;
		text-align: center;
		background: black;
	}
</style>

<style>
	.scoreboard td
  {
		color: white;
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
		margin-left: 20px;
		margin-top: 25px;
		display: inline-block;
		width: 1150px;
		height: 200px;
		text-align: center;
		background: black;
		float: left;
	}

  .clock, .clock2{
    margin:2em;
    position: relative;
    }
  .clock h2, .clock2 h2{
    color: black;
    font-weight: bold;
    float: left;
    position: relative;
    font-size: 200%;
    }
  .counter button{
  	font-size: 20px;
  	padding: 5px;
  	background: black;
  	color: white;
  	font-family: Futura, "Trebuchet MS", Arial, sans-serif;
  	position: relative;
  	top: -180px;  
  	left: -310px;
    display: none;
	}
</style>

<script type="text/javascript">
  var clock;

  $(document).ready(function() {
    clock = new FlipClock($('.clock'),0, {
      clockFace: 'Counter'
    });
    $('.increment').click(function() {
			clock.increment();
		});

		$('.decrement').click(function() {
			clock.decrement();
		});

		$('.reset').click(function() {
			clock.reset();
		});

  });

  var clock2;
  $(document).ready(function() {
    clock2 = new FlipClock($('.clock2'),0, {
      clockFace: 'Counter'
    });
    $('.increment2').click(function() {
			clock2.increment();
		});

		$('.decrement2').click(function() {
			clock2.decrement();
		});

		$('.reset2').click(function() {
			clock2.reset();
		});
  });
</script>

<a name="mems"></a>
<div class="team" style="display:none; background-color: gray; width: 1200px; opacity: 0.8; position: absolute; z-index:7; left: 50px; top: 100px;">
   
    <ul style="list-style-type: none;" class="members">
         <?php
        $f = $_GET['id'];
        $data = $general->member($f);
        foreach($data as $reach)
        {
        ?>
        <li>
           
            <div class="mem0" style="position: relative; left:-50px; background:black;"><ul style="list-style-type:none; margin:0px;">
                <li>
                        <h2 class="rotate"><?php echo $reach['membername'];?></h2>
                        <img src="../uploads/<?php echo $reach['file_name'] ?>" height="300px" width="250px">
                        <div class="details" style="float:right; position: relative; left:-400px; text-color: white;">
                                <h2>NAME :<?php echo $reach['membername'];?></h2>
                                <h2>POSITION :<?php echo $reach['pos'];?></h2>
                                <h2>BRANCH AND YEAR :<?php echo $reach['dept'];?></h2>
                                <h3>AGE :<?php echo $reach['age'];?></h3>
                        </div>

                    </li>
                </ul></div>
                
        </li>
    <?php }?>   
        <!--<li>
            <div class="mem1" style="position: relative; left:-50px; background:black;">
                <ul>
                    <li>
                        <h2 class="rotate" style="left:-140px;">RAINA</h2>
                        <img src="kg1.jpg" height="300px" width="250px">
                        <div class="details" style="float:right; position: relative; left:-500px; text-color: white;"> 
                                <h2>NAME :</h2>
                                <h2>POSITION :</h2>
                                <h2>BRANCH AND YEAR :</h2>
                                <h3>ABOUT ME ---</h3>
                        </div>
                    </li>
                </ul>
                </div>
        </li>-->
    </ul>

</div> 

<style type="text/css">
	.members li{
    list-style-type: none;
    position: relative;
    background-color: black;
    width: 1020px;
    left: 50px;
    margin-top: 25px;
    color: white;
  } 

  .rotate {
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    transform: rotate(270deg);
    position: absolute;
    left: -150px;
    top: 60px;
    font-size: 350%;
  }
</style>


<div id="toolbar"><a href="#" title="Maximize" onClick="ImageViewMode('full');return false"><img src="toolbar_fs_icon.png" width="50" height="50"  /></a></div>
<div id="thumbnails_wrapper">
<div id="outer_container">
<div class="thumbScroller">
	<div class="container">
        <?php
                $f=$_GET['id'];
                $data=$general->gallery($f);
                foreach($data as $reach)
                {
?>
    	<div class="content">
        	<div><a href="../gallery/<?php echo $reach['file_name'];?>"><img src="../gallery/<?php echo $reach['file_name'];?>" style="width: 220px; height: 138px;" alt="Denebola" class="thumb" /></a></div>
        </div>
        <?php
    }?>
      <!--  <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_lux.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_lux.jpg" style="width: 220px; height: 138px;" alt="Lux Aeterna" class="thumb" /></a></div>
        </div>
    	<div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_dk.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_dk.jpg" style="width: 220px; height: 138px;" alt="X-Wing on patrol" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_albireo.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_albireo.jpg" style="width: 220px; height: 138px;" alt="Albireo Outpost" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_church.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_church.jpg" style="width: 220px; height: 138px;" alt="Church of Heaven" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_Decampment.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_Decampment.jpg" style="width: 220px; height: 138px;" alt="Decampment" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_Hibernaculum.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_Hibernaculum.jpg" style="width: 220px; height: 138px;" alt="Hibernaculum" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_lucernarium.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_lucernarium.jpg" style="width: 220px; height: 138px;" alt="Supremus Lucernarium" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_moons.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_moons.jpg" style="width: 220px; height: 138px;" alt="Aurea Mediocritas" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_praedestinatio.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_praedestinatio.jpg" style="width: 220px; height: 138px;" alt="Praedestinatio" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_transitorius.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_transitorius.jpg" style="width: 220px; height: 138px;" alt="Transitorius" class="thumb" /></a></div>
        </div>
        <div class="content">
        	<div><a href="images/Universe_and_planets_digital_art_wallpaper_victimofgravity.jpg"><img src="images/Universe_and_planets_digital_art_wallpaper_victimofgravity.jpg" style="width: 220px; height: 138px;" alt="Victim of Gravity" class="thumb" /></a></div>
        </div>-->
	</div>
</div>
</div>
</div>

<script>
//config
//set default images view mode
$defaultViewMode="full"; //full, normal, original
$tsMargin=30; //first and last thumbnail margin (for better cursor interaction) 
$scrollEasing=600; //scroll easing amount (0 for no easing) 
$scrollEasingType="easeOutCirc"; //scroll easing type 
$thumbnailsContainerOpacity=0.8; //thumbnails area default opacity
$thumbnailsContainerMouseOutOpacity=0; //thumbnails area opacity on mouse out
$thumbnailsOpacity=0.5; //thumbnails default opacity
$nextPrevBtnsInitState="show"; //next/previous image buttons initial state ("hide" or "show")
$keyboardNavigation="on"; //enable/disable keyboard navigation ("on" or "off")

//cache vars
$thumbnails_wrapper=$("#thumbnails_wrapper");
$outer_container=$("#outer_container");
$thumbScroller=$(".thumbScroller");
$thumbScroller_container=$(".thumbScroller .container");
$thumbScroller_content=$(".thumbScroller .content");
$thumbScroller_thumb=$(".thumbScroller .thumb");
$preloader=$("#preloader");
$toolbar=$("#toolbar");
$toolbar_a=$("#toolbar a");
$bgimg=$("#bgimg");
$img_title=$("#img_title");
$nextImageBtn=$(".nextImageBtn");
$prevImageBtn=$(".prevImageBtn");

$(window).load(function() {
	$toolbar.data("imageViewMode",$defaultViewMode); //default view mode
	if($defaultViewMode=="full"){
		$toolbar_a.html("<img src='toolbar_n_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('normal');return false").attr("title", "Restore");
	} else {
		$toolbar_a.html("<img src='toolbar_fs_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('full');return false").attr("title", "Maximize");
	}
	ShowHideNextPrev($nextPrevBtnsInitState);
	//thumbnail scroller
	$thumbScroller_container.css("marginLeft",$tsMargin+"px"); //add margin
	sliderLeft=$thumbScroller_container.position().left;
	sliderWidth=$outer_container.width();
	$thumbScroller.css("width",sliderWidth);
	var totalContent=0;
	fadeSpeed=200;
	
	var $the_outer_container=document.getElementById("outer_container");
	var $placement=findPos($the_outer_container);
	
	$thumbScroller_content.each(function () {
		var $this=$(this);
		totalContent+=$this.innerWidth();
		$thumbScroller_container.css("width",totalContent);
		$this.children().children().children(".thumb").fadeTo(fadeSpeed, $thumbnailsOpacity);
	});

	$thumbScroller.mousemove(function(e){
		if($thumbScroller_container.width()>sliderWidth){
	  		var mouseCoords=(e.pageX - $placement[1]);
	  		var mousePercentX=mouseCoords/sliderWidth;
	  		var destX=-((((totalContent+($tsMargin*2))-(sliderWidth))-sliderWidth)*(mousePercentX));
	  		var thePosA=mouseCoords-destX;
	  		var thePosB=destX-mouseCoords;
	  		if(mouseCoords>destX){
		  		$thumbScroller_container.stop().animate({left: -thePosA}, $scrollEasing,$scrollEasingType); //with easing
	  		} else if(mouseCoords<destX){
		  		$thumbScroller_container.stop().animate({left: thePosB}, $scrollEasing,$scrollEasingType); //with easing
	  		} else {
				$thumbScroller_container.stop();  
	  		}
		}
	});

	$thumbnails_wrapper.fadeTo(fadeSpeed, $thumbnailsContainerOpacity);
	$thumbnails_wrapper.hover(
		function(){ //mouse over
			var $this=$(this);
			$this.stop().fadeTo("slow", 1);
		},
		function(){ //mouse out
			var $this=$(this);
			$this.stop().fadeTo("slow", $thumbnailsContainerMouseOutOpacity);
		}
	);

	$thumbScroller_thumb.hover(
		function(){ //mouse over
			var $this=$(this);
			$this.stop().fadeTo(fadeSpeed, 1);
		},
		function(){ //mouse out
			var $this=$(this);
			$this.stop().fadeTo(fadeSpeed, $thumbnailsOpacity);
		}
	);

	//on window resize scale image and reset thumbnail scroller
	$(window).resize(function() {
		FullScreenBackground("#bgimg",$bgimg.data("newImageW"),$bgimg.data("newImageH"));
		$thumbScroller_container.stop().animate({left: sliderLeft}, 400,"easeOutCirc"); 
		var newWidth=$outer_container.width();
		$thumbScroller.css("width",newWidth);
		sliderWidth=newWidth;
		$placement=findPos($the_outer_container);
	});

	//load 1st image
	var the1stImg = new Image();
	the1stImg.onload = CreateDelegate(the1stImg, theNewImg_onload);
	the1stImg.src = $bgimg.attr("src");
	$outer_container.data("nextImage",$(".content").first().next().find("a").attr("href"));
	$outer_container.data("prevImage",$(".content").last().find("a").attr("href"));
});


function login() {
	$("form").show();
}

function team() {
	$(".team").show();
	$(".scoreboard").hide();
	redirect();
}

function live() {
	$(".scoreboard").show();
	$(".team").hide();
	redirect();
}

function home() {
	$(".scoreboard").hide();
	$(".team").hide();
	redirect();
}



function redirect() {    
	$('#one').css("top", 10);
    $('#two').css("top", 10);
    $('#three').css("top", 10);
    $('#four').css("top", 10);
    $('#five').css("top", 10);
	$("#backdrop").show();
}


function BackgroundLoad($this,imageWidth,imageHeight,imgSrc){
	$this.fadeOut("fast",function(){
		$this.attr("src", "").attr("src", imgSrc); //change image source
		FullScreenBackground($this,imageWidth,imageHeight); //scale background image
		$preloader.fadeOut("fast",function(){$this.fadeIn("slow");});
		var imageTitle=$img_title.data("imageTitle");
		if(imageTitle){
			$this.attr("alt", imageTitle).attr("title", imageTitle);
			$img_title.fadeOut("fast",function(){
				$img_title.html(imageTitle).fadeIn();
			});
		} else {
			$img_title.fadeOut("fast",function(){
				$img_title.html($this.attr("title")).fadeIn();
			});
		}
	});
}

//mouseover toolbar
if($toolbar.css("display")!="none"){
	$toolbar.fadeTo("fast", 0.4);
}
$toolbar.hover(
	function(){ //mouse over
		var $this=$(this);
		$this.stop().fadeTo("fast", 1);
	},
	function(){ //mouse out
		var $this=$(this);
		$this.stop().fadeTo("fast", 0.4);
	}
);

//Clicking on thumbnail changes the background image
$("#outer_container a").click(function(event){
	event.preventDefault();
	var $this=$(this);
	GetNextPrevImages($this);
	GetImageTitle($this);
	SwitchImage(this);
	ShowHideNextPrev("show");
}); 

//next/prev images buttons
$nextImageBtn.click(function(event){
	event.preventDefault();
	SwitchImage($outer_container.data("nextImage"));
	var $this=$("#outer_container a[href='"+$outer_container.data("nextImage")+"']");
	GetNextPrevImages($this);
	GetImageTitle($this);
});

$prevImageBtn.click(function(event){
	event.preventDefault();
	SwitchImage($outer_container.data("prevImage"));
	var $this=$("#outer_container a[href='"+$outer_container.data("prevImage")+"']");
	GetNextPrevImages($this);
	GetImageTitle($this);
});

//next/prev images keyboard arrows
if($keyboardNavigation=="on"){
$(document).keydown(function(ev) {
    if(ev.keyCode == 39) { //right arrow
        SwitchImage($outer_container.data("nextImage"));
		var $this=$("#outer_container a[href='"+$outer_container.data("nextImage")+"']");
		GetNextPrevImages($this);
		GetImageTitle($this);
        return false; // don't execute the default action (scrolling or whatever)
    } else if(ev.keyCode == 37) { //left arrow
        SwitchImage($outer_container.data("prevImage"));
		var $this=$("#outer_container a[href='"+$outer_container.data("prevImage")+"']");
		GetNextPrevImages($this);
		GetImageTitle($this);
        return false; // don't execute the default action (scrolling or whatever)
    }
});
}

function ShowHideNextPrev(state){
	if(state=="hide"){
		$nextImageBtn.fadeOut();
		$prevImageBtn.fadeOut();
	} else {
		$nextImageBtn.fadeIn();
		$prevImageBtn.fadeIn();
	}
}

//get image title
function GetImageTitle(elem){
	var title_attr=elem.children("img").attr("title"); //get image title attribute
	$img_title.data("imageTitle", title_attr); //store image title
}

//get next/prev images
function GetNextPrevImages(curr){
	var nextImage=curr.parents(".content").next().find("a").attr("href");
	if(nextImage==null){ //if last image, next is first
		var nextImage=$(".content").first().find("a").attr("href");
	}
	$outer_container.data("nextImage",nextImage);
	var prevImage=curr.parents(".content").prev().find("a").attr("href");
	if(prevImage==null){ //if first image, previous is last
		var prevImage=$(".content").last().find("a").attr("href");
	}
	$outer_container.data("prevImage",prevImage);
}

//switch image
function SwitchImage(img){
	$preloader.fadeIn("fast"); //show preloader
	var theNewImg = new Image();
	theNewImg.onload = CreateDelegate(theNewImg, theNewImg_onload);
	theNewImg.src = img;
}

//get new image dimensions
function CreateDelegate(contextObject, delegateMethod){
	return function(){
		return delegateMethod.apply(contextObject, arguments);
	}
}

//new image on load
function theNewImg_onload(){
	$bgimg.data("newImageW",this.width).data("newImageH",this.height);
	BackgroundLoad($bgimg,this.width,this.height,this.src);
}

//Image scale function
function FullScreenBackground(theItem,imageWidth,imageHeight){
	var winWidth=$(window).width();
	var winHeight=$(window).height();
	if($toolbar.data("imageViewMode")!="original"){ //scale
		var picHeight = imageHeight / imageWidth;
		var picWidth = imageWidth / imageHeight;
		if($toolbar.data("imageViewMode")=="full"){ //fullscreen size image mode
			if ((winHeight / winWidth) < picHeight) {
				$(theItem).attr("width",winWidth);
				$(theItem).attr("height",picHeight*winWidth);
			} else {
				$(theItem).attr("height",winHeight);
				$(theItem).attr("width",picWidth*winHeight);
			};
		} else { //normal size image mode
			if ((winHeight / winWidth) > picHeight) {
				$(theItem).attr("width",winWidth);
				$(theItem).attr("height",picHeight*winWidth);
			} else {
				$(theItem).attr("height",winHeight);
				$(theItem).attr("width",picWidth*winHeight);
			};
		}
		$(theItem).css("margin-left",(winWidth-$(theItem).width())/2);
		$(theItem).css("margin-top",(winHeight-$(theItem).height())/2);
	} else { //no scale
		$(theItem).attr("width",imageWidth);
		$(theItem).attr("height",imageHeight);
		$(theItem).css("margin-left",(winWidth-imageWidth)/2);
		$(theItem).css("margin-top",(winHeight-imageHeight)/2);
	}
}

//Image view mode function - fullscreen or normal size
function ImageViewMode(theMode){
	$toolbar.data("imageViewMode", theMode);
	FullScreenBackground($bgimg,$bgimg.data("newImageW"),$bgimg.data("newImageH"));
	if(theMode=="full"){
		$toolbar_a.html("<img src='toolbar_n_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('normal');return false").attr("title", "Restore");
	} else {
		$toolbar_a.html("<img src='toolbar_fs_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('full');return false").attr("title", "Maximize");
	}
}

//function to find element Position
	function findPos(obj) {
		var curleft = curtop = 0;
		if (obj.offsetParent) {
			curleft = obj.offsetLeft
			curtop = obj.offsetTop
			while (obj = obj.offsetParent) {
				curleft += obj.offsetLeft
				curtop += obj.offsetTop
			}
		}
		return [curtop, curleft];
	}
</script>
</body>
</html>
