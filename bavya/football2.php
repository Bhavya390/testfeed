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

	<title>Football Feed</title>
    
    <link href="../blogpage/css/bootstrap.min.css" rel="stylesheet" type="text/css">        
    <link href="../blogpage/css/sportsfeed.css" rel="stylesheet" type="text/css">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  
    
    <style>
	
	body
	{
		height:100%;
		overflow-x:scroll;
		overflow-y:hidden;
		font-family:"Segoe UI";
		font-weight:bold;
		color:#FFF;
		width:auto;
	}
	
	#container
	{
		height:100%;
		width:500%;
	}
		
	#club_1
	{
		width:15%;
		height:100%;
		margin-right:2%;
		float:left;
		margin-left:2%;
	}
	
	#club_2
	{
		width:23%;
		height:100%;
		margin-right:2%;
		float:left;
	}
	
	#club_3
	{
		width:10%;
		height:100%;
		margin-right:2%;
		float:left;
	}
	
	#club_5
	{
		width:14%;
		height:100%;
		margin-right:2%;
		float:left;
	}
	
	#club_4
	{
		width:15%;
		height:100%;
		margin-right:2%;
		float:left;
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
	

	
	#topbar
	{
		height:20%;
		width:100%;
		float:left;
	}
	
	#banner
	{
		float:left;
		height:100%;
		width:50%;
		font-size:36px;
		margin:0 auto;
	}
	
	#admin
	{
		float:left;
		height:100%;
		width:50%;
		font-size:36px;
	}
	
	.tiles
	{
		
		height:24%;
		width:15%;
		float:left;
		margin-top:1.15%;
		margin-left:1%;
		text-align:center;
		background-size:cover;
	}
	
	#club_2 .tiles
	{
		
		height:24%;
		width:10%;
		float:left;
		margin-top:1.15%;
		margin-left:1%;
		text-align:center;
		background-size:cover;
	}
	
	.b_tiles
	{
		
		height:85%;
		width:11%;
		float:left;
		margin-top:1.15%;
		margin-left:1%;
		text-align:center;
		background-size:cover;
		color:#FFF;
	}
	
	#lat_news
	{
		float:left;
		height:49%;
		width:95%;
		margin-left:2%;
	}
	
	#lat_news_pic span
	{
		position:absolute;
		bottom:0;
		left:0;
		background-color:#000;
	}
	
	#lat_news_pic
	{
		position:relative;
		float:left;
		height:100%;
		width:100%;
		background-size:cover;
	}
	
	#glow_tile
	{
		opacity:0;
		height:100%;
		width:100%;
		margin-top:-12%;
		background-color:#000;
		z-index:-50;
		position:relative;
	}
	
	#main_news
	{
		font-weight:bold;
		text-align:left;
		height:92%;
		width:50%;
		float:left;
		background-size:cover;
		position:relative;
	}
	
	#news_ele
	{
		width:20%;
		height:92%;
		float:left;
	}
	
	.tiles:hover #glow_tile
	{
		-webkit-animation:glow 1s;
		-webkit-animation-fill-mode:forwards;
	}
	
	@-webkit-keyframes glow
	{
		100%
		{
			opacity:1;
		}	
	}
	
	#live_data
	{
		background-color:#000; 
		width:100%; 
		height:17%; 
		text-align:center; 
		margin-left:0
	}
	
	.pla
	{
		background-color:#000;
		height:25%;
		width:10%;
		float:left;
		margin-left:1%;
		margin-top:2%;
	}
	
	.pla_pic
	{
		height:35%;
		width:100%;
		float:left;
		background-size:contain;
	}
	
	.pla_det
	{
		text-align:center;
		height:25%;
		width:100%;
		float:left;
		color:#FFF;
		font-size:12px;
	}
	
	.btn
	{
		border:medium solid #000;
		color:#FFF;
		background-color:#060;
		font-family:"Segoe UI";
	}
	
	</style>
    
</head>

<body style="background:url(../Res/fb-2.jpg) no-repeat fixed; background-size:cover;">

	<div id="container">
    	<div id="club_1">
 
        	<div id="topbar">
            	<div class="b_tiles" style="background-image:url(../Res/fb-banner-1.png); margin-left:2%;">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/fb-b-2.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/fb-b-2.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/T-fb.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/fb-b-4.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/fb-b-5.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/L-fb.png)">
           	    </div>
                
                <div class="b_tiles" style="background-image:url(../Res/L-fb.png)">
           	    </div>
            	
            </div>
            
            <div class="tiles" id="lat_news">
            	<div id="lat_news_pic" style="background-image:url(../Res/FC-Barcelona-VS-Real-Madrid-019.jpg)">
                <span style=" font-weight:lighter;margin-left:2%; margin-top:2%;">Messi scores 5 past Diego, Barcelona fields a perfect win</span>
                </div>            
            </div>
            
            <a href="#club_2" style="text-decoration:none"><div class="tiles" style="background-image:url(../Res/N-fb.png);margin-left:2%;"><span style="z-index:0; position:relative; color:#FFF">NEWS</span>
            <div id="glow_tile"></div>
            </div></a>
            
            <a href="#club_3" style="text-decoration:none"><div class="tiles" style="background-image:url(../Res/L-fb.png)"><span style="z-index:0; position:relative;color:#FFF">LIVE</span>
            <div id="glow_tile"></div>
            </div></a>
            
            <a href="#club_4" style="text-decoration:none"><div class="tiles" style="background-image:url(../Res/G-fb.png)"><span style="z-index:0; position:relative;color:#FFF">GALLERY</span>
            <div id="glow_tile"></div>
            </div></a>
            
            <a href="#club_5" style="text-decoration:none"><div class="tiles" style="background-image:url(../Res/T-fb.png)"><span style="z-index:0; position:relative;color:#FFF">TEAM</span>
            <div id="glow_tile"></div>
            </div></a>
            
             <a href="#club_1" style="text-decoration:none"><div class="tiles" style="background-image:url(../Res/fb-b-5.png)"><span style="z-index:0; position:relative;color:#FFF">ADMIN</span>
             <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
             <div id="glow_tile">
             	
             <form action="" method="post">
             ACCESS CODE :
             </br>
             <!--<input type="text" style="width:100%"/>
             <input type="submit" value="LogIn" class="btn"/>-->
             <input type="password" name="key" id="admin_pwrd" style="width:100%"/>
            		<input type="submit" value="LogIn" class="btn"/>
             </form>
             </div>
           	 </div></a>
            </div>
            
            <div id="club_2">
            	<div style="height:5%; width:100%; float:left">
            	<span>NEWS</span>
                </div>
            	<?php
            	$f=$_GET['id'];
            	$data=$general->gallery($f);
            	foreach($data as $reach)
            	{

            	}

            	?>
                <div id="main_news" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)">
                	<?php
                	$f=$_GET['id'];
                	$data=$general->posts($f);
                	foreach($data as $reach)
                	{

                	}
                	?>
                <span style="position:absolute; bottom:-20; left:0;"><?php echo $reach['postTitle']?></span>
                </div>
                <?php
				$f= $_GET['id'];
				$data = $general->posts($f);
				foreach($data as $reach)
				{
					echo " <div class='tiles' style=' background-color:#000'><span style='z-index:0; position:relative'>".$reach['postTitle']."</span>
	            </div> ";
				}

				?>     
          </div>
          
          <div id="club_3">
          <div style="height:5%; width:100%; float:left">
            	<span>LIVE</span> 
          </div>
          
          <div style="background-image:url(../Res/Barca_walls_2013_2.jpg); background-size:cover; height:30%; width:100%; float:left">
          </div>
          <?php
          $f=$_GET['id'];
          $data= $general->score($f);
         
          	echo "<div class='tiles'  id='live_data'>";
          	echo "<span>".$reach['oppname']."  " .$reach['oppscore']."-" .$reach['homename']." ".$reach['homescore']."</span>";
          	echo "</br>";
          	echo "<span style='text-align:center; font-size:36px'>".$reach['gametime']."</span>";
          	echo "</div>";
          


          ?>  
          </div>
          
          <div id="club_5">
          <div style="height:5%; width:100%; float:left">
            	<span>TEAM</span> 
          </div>
         
         <?php
         $f=$_GET['id'];
         $data=$general->member($f);
         foreach($data as $reach)
         {

         	echo "<div class='pla'>";
         ?>
         <div class="pla_pic" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)"></div>
         <?php
         echo "<div class='pla'>";
         echo"<div class='pla_det'>";
         echo $reach['membername'];
         echo "</br>";
         echo $reach['dept'];
         echo "</br>";
         echo $reach['pos'];
         echo "</div>";
         echo "</div>";
         echo "</div>";
     }
         ?> 
          </div>
          
          
          
          
          <div id="club_4">
          <div style="height:5%; width:100%; float:left">
            	<span>GALLERY</span> 
          </div>
          </br>
          </br>
          
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
            
        </div>
      
</body>
<script>
var admin_div;
document.getElementsByClassName("tiles").item(5).onclick=function()
{
	admin_div=document.getElementsByClassName("tiles").item(5);
	admin_div.childNodes.item(2).style.zIndex=50;
	admin_div.childNodes.item(2).style.backgroundColor="#000";
};
</script>

</html>