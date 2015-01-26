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
	
    <title>Handball</title>
    
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style>
	@font-face
	{
		font-family:"Adobe Gothic Std B";
		src :url(./AdobeGothicStd-Bold.otf);	
	}

	@font-face
	{
		font-family:"Edit Undo BRK";
		src :url(./editundo.ttf);
	}


	#container
	{
		width:80%;
		background-image:url(../Res/moist.png);
		background-size:cover;
		height:100%;
		margin:0 auto;
	}
	
	#topspace
	{
		width:100%;
		height:20%;
		background-image:url(../Res/wite-1.png);
		background-size:cover;
	}
	
	#banner
	{
		width:35%;
		height:37%;
		font-family:"Edit Undo BRK", "Edit Undo -BRK-";
		font-size:50px;
		background-color:#000;
		color:#FFF;
	}
	
	#menubar
	{
		width:100%;
		height:5%;
		background-color:#000;
		font-family:"Edit Undo BRK", "Edit Undo -BRK-";
		color:#FFF;
		border-color:#F00;
		border-style:solid;
		border-bottom-width:thick;
		border-top-width:0;
		border-left-width:0;
		border-right-width:0;
			
	}
	
	.btn
	{
		background-color:#000;
		color:#FFF;
		text-align:center;
		cursor:pointer;
		float:left;
		margin-left:2%;
		font-size:25px;
		height:100%;
		margin-top:-1%;

		
		
	}
	
	.btn:hover
	{
		color:#F00;
	}
	
	#break_new
	{
		height:75%;
		width:100%;
		background-size:cover;
	}
	
	#news-cntrl
	{
		height:30%;
		width:100%;
		float:left;
		margin-top:25.5%;
	}
	
	#news-box
	{
		float:right;
		height:100%;
		width:30%;
		background-image:url(../Res/black-1.png);
		background-size:cover;
		font-family:"Edit Undo BRK", "Edit Undo -BRK-";
		color:#FFF;
	}
	
	#des_news
	{
		background-color:#000;
		height:10%;
		width:100%;
		float:left;
		border-top-color:#FFF;
		border-top-width:1%;
		border-top-style:solid;
		border-bottom-color:#F00;
		border-bottom-width:thick;
		border-bottom-style:solid;
		color:#FFF;
		margin-bottom:2%;
		font-family:"Edit Undo BRK", "Edit Undo -BRK-";
	}
	
	.cntrl-btn
	{
		float:left;
		height:20%;
		width:5%;
		font-family:"Adobe Gothic Std B";
		background-color:#000;
		color:#FFF;
		text-align:center;
		padding-top:1%;
		margin-top:9%;
	}
	
	.cntrl-btn:hover
	{
		color:#F00;
		cursor:pointer;
	}
	
	#live
	{
		width:100%;
		height:8%;
		background-image:url(../Res/black-1.png);
		background-size:cover;
		border-bottom-color:#F00;
		border-bottom-width:thick;
		border-bottom-style:solid;
		font-family:"Edit Undo BRK", "Edit Undo -BRK-";
		font-size:40px;
		color:#FFF;
		margin-top:2%;
	}
	
	.uplift
	{
		margin-top:0%;
	}
	
	.pla_pic
	{
		height:100%;
		width:35%;
		background-size:cover;
		float:left;
	}
	
	.pla_ele
	{
		border-bottom-width:medium;
		border-bottom-color:#FFF;
		border-bottom-style:solid;
		height:15%;
		width:28.75%;
		float:left;
		margin-left:3%;
		margin-top:4%;
	}
	
	.pla_data
	{
		float:left;
		width:65%;
		height:100%;
		background-color:#000;
		color:#FFF;
		font-family:"Adobe Gothic Std B";
	}
	
	.news
	{
		margin-top:2%;
		margin-left:5%;
	}
	
	#lt_news
	{
		margin-top:2%;
		background-image:url(../Res/black-1.png);
		background-size:cover;
		height:70%;
		width:100%;
		font-family:"Adobe Gothic Std B";
		color:#FFF;
		
		border-bottom-color:#F00;
		border-bottom-style:solid;
		border-bottom-width:thick;
	}
	
	#team
	{
		background-image:url(../Res/black-1.png);
		background-size:cover;
		height:60%;
		width:100%;
		border-bottom-color:#F00;
		border-bottom-width:thick;
		border-bottom-style:solid;
		margin-top:2%;
	}
	
	#admin_acc
	{
		font-family:"Adobe Gothic Std B";
		background-color:#000;
		color:#FFF;
	}
	
	#admin_acc
	{
		visibility:hidden;
		height:100%;
		width:30%;
	}
	
	h2{
   				margin: 0;     
   	 			color: #666;
    			padding-top: 90px;
    			font-size: 52px;
    			font-family: "trebuchet ms", sans-serif;    
			}
	.item{
   	 background: #333;
	 background-size:cover;    
   	 text-align: center;
   	 height: 100% !important;
	}
	.carousel{
		 width:100%;
		 height:100%;
	}
	.bs-example{
		height:90%;
		
	}

	      
	
	</style>
    
</head>

<body style="background:url(../Res/Doa_and.jpg) repeat center">

	<div id="container">
    	<div id="topspace">
        	<div id="banner">
            <p style="margin-left:2%; margin-top:2%;">HANDBALL FEED</p>
            </div>
        </div>
        
        <div id="menubar">
        	<a href="../hpage.php"><div class="btn">HOME</div></a>
            <a href="#live"><div class="btn">LIVE</div></a>
            <a href="#team"><div class="btn">TEAM</div></a>
            <a href="#gallery"><div class="btn">GALLERY</div></a>
            <a href="../blogpage/bloghome.php"><div class="btn">BLOG</div></a>
            <div class="btn" id="bar_btn">ADMIN</div>
            <div id="admin_acc" class="btn">
  <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
            <form action="" method="post">
                <input type="password" id="acc_code" style="border-bottom-color:#F00; border-bottom-width:thick; border-bottom-style:solid; border-top:none; border-right:none; border-left:none; width:70%; height:220%; color:#000" name="key"/>
                <input type="submit" value="LogIn" style="background-color:#000; color:#FFF; font-family:'Adobe Gothic Std B'; border-bottom-color:#F00; border-bottom-width:thick; border-bottom-style:solid; border-top:none; border-right:none; border-left:none; margin-top:-2%"; />
            </form>
            </div>
            
            
        </div>
        <a name="gallery">
        <div id="break_new" >
        	        <div class="bs-example">
                <!--EXTERNAL CODE : GALLERY-->
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    	
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <h2>GALLERY</h2>
                
            </div>
             <?php  
      $f = $_GET['id'];
      $images = $general->gallery($f);
      $i = 0;
      foreach($images as $reachs)
      {
?>
            <div class="item" style="background-image:url(../gallery/<?php echo $reachs['file_name'];?>)">
                
            </div>
<?php
}?>
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
        </a>

        <div id="live" >
        <?php
        $f = $_GET['id'];
        $data =$general->score($f);
         echo "<p style='float:left' class='uplift'>".$data['gametime']."'</p>";
        echo"<p style='float:left; margin-left:10%;' class='uplift'>".$data['oppname']."</p>";
        echo"<p style='float:left; margin-left:8%;' class='uplift'>".$data['oppscore']."</p>";
        echo"<p style='float:left; margin-left:15%;' class='uplift'>".$data['homename']."</p>";
       echo" <p style='float:left; margin-left:8%;' class='uplift'>".$data['homescore']."</p>";


?>
        </div>

<a name="live">        
        <div id="lt_news">
        <div id="des_news">
        	<p style="font-size:40px; margin-top:-0.25%">LATEST NEWS AND UPDATES</p>
        </div>
        
        <?php
                $f= $_GET['id'];
                $data = $general->posts($f);
                foreach($data as $reachs)
                {
                        echo"<p class='news'><span style='font-family:'Edit Undo BRK', 'Edit Undo -BRK-''>></span>".$reachs['postTitle']."</p>";
                        echo"<p class='news' style='margin-left:10%'><span style='font-family:'Edit Undo BRK', 'Edit Undo -BRK-''>></span>".$reachs['postCont']."</p>";


        }?>
        
        </div>
        </a>
<a name="team">
        <div id="team">
<?php
        $f= $_GET['id'];
        $data = $general->member($f);
        
 foreach($data as $reach)
                {

                        echo "<div class='pla_ele'>";
                ?>

        <div class="pla_pic" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)"></div>
<?php
                        echo "<div class='pla_data'>";
                        echo "<div class='name'> &nbsp; &nbsp;".$reach['membername']."</div>";
                        echo "<div class='info'>";
                        echo "&nbsp; &nbsp; ". $reach['dept'];
                        echo "&nbsp; &nbsp;".$reach['age'];
                        echo "&nbsp; ".$reach['pos'];
                        echo "</div>";
                        echo"</div>";
                        echo "</div>";

                }

        ?>

        </div>
        
    
</a>
    <script>
    	var a=document.getElementById("admin_acc");
		var b=document.getElementById("bar_btn");
		
		b.onclick=function(){
			if(document.getElementById("admin_acc").style.visibility!='visible')
			a.style.visibility='visible';
			else
			a.style.visibility='hidden'
			return true;
			
		};
	</script>
</body>

</html>
