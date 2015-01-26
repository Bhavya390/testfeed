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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transiti onal//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>The BasketBall Team of NIT Trichy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="functions.js"></script>
<link rel="stylesheet" href="flipclock.css">
<script src="jquery.min.js"></script>
<script src="flipclock.js"></script>
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jssor.js"></script>
<script type="text/javascript" src="jssor.slider.js"></script>
<script>

        jQuery(document).ready(function ($) {

            var _SlideshowTransitions = [
            //Fade in L
                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out R
                , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade in R
                , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out L
                , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];

            var options = {
                $AutoPlay: true,                                    
                $AutoPlayInterval: 2000,                            
                $PauseOnHover: 1,                                
                $DragOrientation: 3,                                
                $ArrowKeyNavigation: true,   			            
                $SlideDuration: 800,                                
                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 7,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 248                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }

        });
</script>

</head>

<body>

<style>
    body { 
          background: black;
         -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          max-height: 100%;
          max-width: 100%;
          }
</style>

<div class="fix-div">
	<div class="cf">
		<ul>
			<li><a href="../hpage.php"><h2>HOME</h2></a>
			</li>
			<li><a href="#mems"><h2>TEAM</h2></a>
			</li>
			<li><a href="#matches"><h2>MATCHES</h2></a>
			</li>
			<li><a href="../blogpage/bloghome.php"><h2>BLOG</h2></a>
			</li>
		</ul>
	</div>

	<div id="container">
	    <div class="login">
	      	<div id="to"><h2>ADMIN</h2></div>
          <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
	  				      	<form action="" method="post" target="">
		        <input type="password" class="email_field" name="key" size="18" placeholder="Enter Key"  />
		        <input type="hidden" value="sicanstudios" name="uri"/>
		        <input type="hidden" name="loc" value="en_US"/>
		        <input class="email_btn" name="submit" type="submit" value="GO"/>
	      	</form>
	    </div>
	</div>

	<div id="slider1_container" style="position: relative; left: 18%; top: 20px; width: 800px;
        height: 550px; background: #191919; overflow: hidden;">
        <div u="loading" style="position: relative;">
        	<div style="filter: alpha(opacity=70); opacity:0.7; position: relative; display: block; background-color: #000000; left: 400px;width: 100%;height:100%;"></div>
        	<div style="position: relative; display: block; background: url(/images/loading.gif) no-repeat center center; left: 200px;width: 100%;height:100%;"></div>
        </div>
	    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 450px; overflow: hidden;">
	    			    
                 <?php  
      $f = $_GET['id'];
      $images = $general->gallery($f);
      $i = 0;
      foreach($images as $reachs)
      {
?>
                	<div>
		                <img u="image" src="../gallery/<?php echo $reachs['file_name'];?>" />
		                <img u="thumb" src="../gallery/<?php echo $reachs['file_name'];?>" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
            <?php
          }?>
		    		    	<!--<div>
		                <img u="image" src="gallery/gall2.jpg" />
		                <img u="thumb" src="gallery/gall2.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall3.jpg" />
		                <img u="thumb" src="gallery/gall3.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall4.jpg" />
		                <img u="thumb" src="gallery/gall4.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall5.jpg" />
		                <img u="thumb" src="gallery/gall5.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall6.jpg" />
		                <img u="thumb" src="gallery/gall6.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall7.jpg" />
		                <img u="thumb" src="gallery/gall7.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	    
		    		    	<div>
		                <img u="image" src="gallery/gall8.jpg" />
		                <img u="thumb" src="gallery/gall8.jpg" style="max-width: 72px; max-height: 72px;" />
		        </div>	-->    
		     
		</div>
	
		<span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 8px;"></span>
		<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px"></span>

	    <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 800px; height: 100px; left:0px; top: 450px;">
	    	<div u="slides" style="cursor: move;">
	            <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
	                <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
	                <div class=c></div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<div id="wrapper" style="background: url(./images/bgbb.jpg);">
<a name="matches">
<div class="updates">
	<h2>UPDATES</h2>
	<ul style="list-style-type: none;">
		<li style="text-align:left;">
       <?php
              $f=$_GET['id'];
              $data=$general->posts($f);
              foreach($data as $reach)
              {
              ?>
		<tr>
      <div class='news_ele'>
      <p id='news_hdline' style='margin-top:2%'><?php echo $reach['postTitle']?></p>
      <p id='news_desc' style='margin-top:-2%; font-size:12px; float:left'><?php echo $reach['postDesc']?></p> <p><?php echo $reach['postCont']?></p>
      <p id='news_date' style='margin-top:-2%; font-size:12px; float:right'><?php echo $reach['postDate']?></p>
    </br>
  </div>
</tr>
<?php 
}?>
   <!-- <tr>
    <div class='news_ele'>
      <p id='news_hdline' style='margin-top:2%'>circket</p>
      <p id='news_desc' style='margin-top:-2%; font-size:12px; float:left'>won in trichy</p>
      <p id='news_date' style='margin-top:-2%; font-size:12px; float:right'>2014-09-17 08:37:22</p>
    </br>
  </div>
</tr>	-->
		</li>
	</ul>
</div></a>
<style>
	.updates{
		border-style: ridge;
		border-color: black;
		color: black;
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
		border-radius: 5px;
		margin-right: 40px;
		margin-top: 25px;
		display: inline-block;
		float: right;
		width: 350px;
		height: 420px;
		text-align: center;;

		background: rgba(155, 0, 0, 0.4);
	}
</style>


<div class="scoreboard">
<a name="matches"></a>
<table>
<td>
    <h2 style="text-align:center;">HOME</h2>
   <!-- <div class="clock"></div>
      <div class="counter">
        <button type="button" class="increment">+1</button>
      	<button type="button" class="decrement">-1</button>
      	<button type="button" class="reset">Reset</button>
    	</div>-->
      <?php
    $f=$_GET['id'];
    $data=$general->score($f);
    ?>
	    <div style="position:relative; display:inline-block; top:-20px; margin-right:40px;">
      	<h3><?php echo $data['homename'];?></h3>	
      	<h3><?php echo $data['homescore']; ?></h3>
	    </div>
	<!--<div style="position:relative; display:inline-block; top:-140px;">
	<h3>Third Quarter : 3</h3>
	<h3>Final Quarter : 3</h3>
	</div>-->
</td>
<td>
    <h2>AWAY</h2>
	<!--<div class="clock2"></div>
	<div class="counter">
	<button type="button" class="increment2">+1</button>
	<button type="button" class="decrement2">-1</button>
	<button type="button" class="reset2">Reset</button>
	</div>-->
	<div style="position:relative; display:inline-block; top:-20px; margin-right:40px;">	
	<h3><?php echo $data['oppname'];?></h3>
	<h3><?php echo $data['oppscore'];?></h3>
	</div>
	<!--<div style="position:relative; display:inline-block; top:-140px;">
	<h3>Third Quarter : 3</h3>
	<h3>Final Quarter : 3</h3>
	</div>-->
</td>
</table>
</div>

<style>
.scoreboard td
  {
		color: black;
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
		margin-left: 20px;
		margin-top: 25px;
		display: inline-block;
		width: 800px;
		height: 200px;
		text-align: center;
		background: rgba(155, 0, 0, 0.4);
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

<div>
<a name="mems"></a><div>
    <ul style="list-style-type: none;" class="members">
      <?php
  $f=$_GET['id'];
  $data = $general->member($f);
  foreach($data as $reach)
  {
    ?>
        <li>
            <div class="mem0"><ul style="list-style-type:none; margin:0px;">
                <li>
                        <h2 class="rotate"><?php echo $reach['membername'];?></h2>
                        <img src="../uploads/<?php echo $reach['file_name'] ?>" height="300px" width="250px">
                        <!--<div class="hidden">
                        <img src="images/rondo2.jpg" height="300px" width="250px">
                   
                        <img src="images/rondo3.jpg" height="300px" width="250px">
                    
                        <img src="images/rondo4.jpg" height="300px" width="250px">
                        </div>-->
                        <div class="details" style="float:right; position: relative; left:-400px; text-color: white;">
                                <h2>NAME :  <?php echo $reach['membername'];?></h2>
                                <h2>POSITION :<?php echo $reach['pos'];?></h2>
                                <h2>BRANCH AND YEAR :<?php echo $reach['dept'];?></h2>
                                
                        </div>
                    </li>
                </ul></div>
        </li>
        <?php
      }?>
      <!--  <li>
                <div class="mem1">
                <ul>
                    <li>
                        <h2 class="rotate" style="left:-140px;">KEVIN</h2>
                        <img src="images/kg1.jpg" height="300px" width="250px">
                        <div class="hidden">
                        <img src="images/kg3.jpg" height="300px" width="250px">
                   
                        <img src="images/kg2.jpg" height="300px" width="250px">
                    
                        <img src="images/kg4.jpg" height="300px" width="250px">
                        </div>
                        <div class="details" style="float:right; position: relative; left:-500px;"> 
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

<script>
  $(document).ready(function(){
  $(".mem0").hover(function(){
      $(".mem0 .hidden").hide();
      $(".mem0 .details").show();
  },function(){
      $(".mem0 .hidden").show();
      $(".mem0 .details").hide();
  });     
  $(".mem1").hover(function(){
      $(".mem1 .hidden").hide();
      $(".mem1 .details").show();
  },function(){
      $(".mem1 .hidden").show();
      $(".mem1 .details").hide();
  });       
  });
</script>

</div>
</div>
<style>
  
  h1{
    font-family: Futura, "Trebuchet MS", Arial, sans-serif;
    position: relative;
    left: 30px;
  }

.fix-div{position:fixed; height:100%; width:100%; left:0; top:0; z-index:1;}

.jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(/images/a17.png) no-repeat;
                overflow:hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05ldn { background-position: -250px -40px; }
            .jssora05rdn { background-position: -310px -40px; }
.jssort01 .w {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                }

                .jssort01 .c {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 68px;
                    height: 68px;
                    border: #000 2px solid;
                }

                .jssort01 .p:hover .c, .jssort01 .pav:hover .c, .jssort01 .pav .c {
                    background: url(/images/t01.png) center center;
                    border-width: 0px;
                    top: 2px;
                    left: 2px;
                    width: 68px;
                    height: 68px;
                }

                .jssort01 .p:hover .c, .jssort01 .pav:hover .c {
                    top: 0px;
                    left: 0px;
                    width: 70px;
                    height: 70px;
                    border: #fff 1px solid;
                }

#wrapper{position:relative; z-index:2; margin:100% 0 0; height:100%; width:100%; background: url(./images/bgbb.jpg);}

  #test
  {
    width: 400px;
  }

  #header
  {
    position:absolute; 
    top:-10px;
    left:0;
  }
    
  }
  #test img
  {
    position:absolute;
    left: 33%;
    top:230px;
    border-style: ridge;
    border-width: 5px;
    border-color:black;
  }

  .titleteam
  {
      text-align: left;
      -webkit-transition: color .5s ease-in;
      -moz-transition: color .5s ease-in;
      -o-transition: color .5s ease-in;
      transition: color .5s ease-in;
      position:relative;    
      color:white;
      font-size:100%;
      font-family: Futura, "Trebuchet MS", Arial, sans-serif;
      font-weight:bold;
      left:800px;
      top: 160px;
      top: 300;
  }


  .cf ul {
    -webkit-font-smoothing:antialiased;
    z-index:100;
    position:absolute; 
    top:0px;
    left:0px;
    text-align: center;
    display: inline;
    width:1200;
    margin: 0;
    padding: 15px 0px 12px 10px;
    list-style: none;
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    border-radius: 50%;
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
  }
  .cf ul h2{
    color: white;
    font-weight: bold;
    text-decoration: none;
    padding-top: 0px;
    font-size: 200%;
    vertical-align: center;
  }
  .cf ul a {
    -webkit-transition: all .25s ease;
         -moz-transition: all .25s ease;
          -ms-transition: all .25s ease;
           -o-transition: all .25s ease;
              transition: all .25s ease;
  }

  .cf ul li:hover {
    -webkit-animation: cham 3s infinite; 
    -moz-animation:    cham 3s infinite;
    -o-animation:      cham 3s infinite; 
    animation:         cham 3s infinite; 
  }
  @-webkit-keyframes cham {
    0%   { opacity: 1; }
    40%  { background: black;
    opacity:1.0; }
    100% { background: #555;
    opacity:1.0;
    color: black; }
  }
  @-moz-keyframes cham {
    0%   { opacity: 1; }
    40%  { background: #555;
    opacity:1.0;
    color: black; }
    100% { background: #555;
    opacity:1.0;
    color: black; }
  }
  @-o-keyframes cham {
    0%   { opacity: 1; }
    40%  { background: #555;
    opacity:1.0;
    color: black; }
    100% { background: #555;
    opacity:1.0;
    color: black; }
  }
  @keyframes cham {
    0%   { opacity: 1; }
    100% { background: #555;
    opacity:1.0;
    color: black; }
  }

  .cf ul a:link{
    color: white;
    font-weight: bold;
    text-decoration: none;
  }
  .cf ul li a:link{
    color: white;
    font-weight: bold;
    text-decoration: none;
  }
  .cf ul li h3{
    color: white;
    font-weight: bold;
    text-decoration: none;
  }
  .cf ul li, #container,
  #container_2 {
    font-family: Futura, "Trebuchet MS", Arial, sans-serif;
    text-decoration: none;
    color: white;
    font-weight:bold none;
    font-size:12px;
    display: inline-block;
    margin-right: 2px;
    position: relative;
    top:-10px;
    left:184px;
    padding: 15px 20px ;
    background: blue;
    opacity:0.3;
    cursor: pointer;
    width:100px;
    height: 60px;
    -webkit-transition: all .25s ease;
    -moz-transition: all .25s ease;
    -ms-transition: all .25s ease;
    -o-transition: all .25 ease;
    -transition: all .25s ease;
    border-top-left-radius: 10%;
    border-top-right-radius: 10%;
    border-bottom-right-radius: 10%;
    border-bottom-left-radius: 10%;
  } 


  .login h2{
    font-size: 100%;
    color: white;
    font-weight: bold;
    text-decoration: none;
    padding-bottom: 20px;
    text-align: center;
  }

  #container{
    text-align: center;
    position: relative;
    left: 780px;
    top: 5px;
    width: 250px;
    border-top-left-radius: 5%;
  border-top-right-radius: 5%;
  border-bottom-right-radius: 5%;
  border-bottom-left-radius: 5%;
  }


  .login {
    text-align: center;
    display: block;
    margin: 0 auto;
    position: absolute;
  }
  .login div {
    width: 250px;
    height: 70px;
    cursor: pointer;
    font-size: 25px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    margin: 0 auto;
  }
  .login:hover>form {
    display: block;
    margin-bottom: -6px;
    height: 60px;
    padding-bottom: 5px;
    padding-top: 5px;

  }
  form input[type=text],
  form input[type=submit] {
    font-family: Futura, "Trebuchet MS", Arial, sans-serif;
    font-size: 22px;
    width: 200px;
    height: 50px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
  }
  input[type=text] {
    background: #eee;
    border: solid 2px #ddd;

  }
  form input[type=submit] {
    width: 50px;
    cursor: pointer;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-appearance: none;
    border: none;
    color: #fff;
    background: #5f7c1e;
  }
  .text_container {
    text-align: left;
    width: 500px;
    margin: 0 auto 10px;
    padding: 10px;
    cursor: pointer;
  }
  .text_container div p {
    cursor: default !important;
    margin-bottom: 10px
  }
  .visible>div {
    display: block;
    font-size: 17px;
  }
  form,
  .login:hover>div,
  .hidden>div {
    display: none
  }

  p.clear {
      clear: both;
  }

  table.profile td{
      position: relative;
      width: 400px;
      height: 450px;   
      top: 10px;
      border-style: ridge;
      border-radius: 20%;
      display: inline-table;
      margin-right: 120px;
      margin-left: 120px;
      margin-top: 120px;
      margin-bottom: 20px;
  }
  table.profile td img{
      width: 100px;
      height: 150px;  
      opacity: 1;
      position: absolute;
      float: left;
  left: 30px;
  top: 20px;  
  border-radius: 50%;
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
  }

  table.profile td h3{
      float: right;
      position: absolute;
      left: 140px;
      top: 20px;
  }

  .slides {
      padding: 0;
      width: 800px;
      height: 550px;
      margin: 0 auto;
      position: relative;
      margin-top: 25px;
      border-radius: 5px;
      border-color: black;
      border-style: ridge;
    }

  .slides * {
      user-select: none;
      -ms-user-select: none;
      -moz-user-select: none;
      -khtml-user-select: none;
      -webkit-user-select: none;
      -webkit-touch-callout: none;
  }

  .slides input { display: none; }

  .slide-container { display: block; }

  .slide {
      top: 0;
      opacity: 0;
      width: 800px;
      height: 550px;
      display: block;
      position: absolute;

      transform: scale(0);

      transition: all .7s ease-in-out;
  }

  .slide img {
      width: 100%;
      height: 100%;
  }

  .nav label {
      width: 200px;
      height: 100%;
      display: none;
      position: absolute;

      opacity: 0;
      z-index: 9;
      cursor: pointer;

      transition: opacity .2s;

      color: #FFF;
      font-size: 156pt;
      text-align: center;
      line-height: 380px;
      font-family: Futura, "Trebuchet MS", Arial, sans-serif;
      background-color: rgba(255, 255, 255, .3);
      text-shadow: 0px 0px 15px rgb(119, 119, 119);
  }

  .slide:hover + .nav label { opacity: 0.5; }

  .nav label:hover { opacity: 1; }

  .nav .next { right: 0; }

  input:checked + .slide-container  .slide {
      opacity: 1;

      transform: scale(1);

      transition: opacity 1s ease-in-out;
  }

  input:checked + .slide-container .nav label { display: block; }

  .nav-dots {
    width: 100%;
    bottom: 9px;
    height: 11px;
    display: block;
    position: absolute;
    text-align: center;
  }

  .nav-dots .nav-dot {
    top: -5px;
    width: 11px;
    height: 11px;
    margin: 0 4px;
    position: relative;
    border-radius: 100%;
    display: inline-block;
    background-color: rgba(0, 0, 0, 0.6);
  }

  .nav-dots .nav-dot:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.8);
  }

  input#img-1:checked ~ .nav-dots label#img-dot-1,
  input#img-2:checked ~ .nav-dots label#img-dot-2,
  input#img-3:checked ~ .nav-dots label#img-dot-3,
  input#img-4:checked ~ .nav-dots label#img-dot-4,
  input#img-5:checked ~ .nav-dots label#img-dot-5,
  input#img-6:checked ~ .nav-dots label#img-dot-6 {
    background: rgba(0, 0, 0, 0.8);
  }

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

  .hidden{
    display: inline-block;
  }

  .details{
    display: none;
    color: white;
  }
</style>
</body>
</html>



