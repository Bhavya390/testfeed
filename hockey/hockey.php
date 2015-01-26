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
    
    	<title>Hockey</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

        <style>
        	@font-face
			{
				font-family: "Adobe Gothic Std B";
				src: url(../AdobeGothicStd-Bold.otf);
			}
			
			#m_cont
			{
				height:100%;
				width:100%;
			}
			
			#bar_top
			{
				background-color:#eaeef1;
				height:6%;
				width:100%;
				font-family:"Adobe Gothic Std B";
				color:#333;
				
			}
			
			.btn
			{
				height:100%;
				margin-left:1%;
				float:left;
				padding-top:1%;

			}
			
			#banner
			{
				font-family:"Adobe Gothic Std B";
				color:#eaeef1;
				height:30%;
				width:100%;
				font-size:70px;
				font-weight:bolder;
				text-align:center;
			}
			
			#blank
			{
				width:20%;
				float:left;
			}
			
			#content
			{
				width:80%;
				height:64%;
				margin:0 auto;	
			}
			
			.bar_div
			{
				font-family:"Adobe Gothic Std B";
				color:#eaeef1;
				font-size:24px;
				float:left;
			}
			
			#match_name
			{
				height:20%;
				width:100%;
				float:left;
				font-family:"Adobe Gothic Std B";
				font-size:70px;
				color:#eaeef1;
				background-color:#000;
				text-align:center;	
			}
			
			#live
			{
				height:100%;
				width:45%;
				float:left;
			}
			
			#match_data
			{
				height:30%;
				width:100%;
				background-color:#eaeef1;
				color:#000;
				font-family:"Adobe Gothic Std B";
				color:#000;
				float:left;
				text-align:center;
			}
			
			#live_pic
			{
				background-image:url(../Res/ho_1.jpg);
				background-size:cover;
				height:50%;
				width:100%;
				float:left;
			}
			
			#news
			{
				margin-left:5%;	
				height:100%;
				width:50%;
				float:left;
			}
			
			#news_lat
			{
				height:50%;
				width:100%;
				font-family:"Adobe Gothic Std B";
				color:#eaeef1;
				float:left;

			}
			
			#news_pic
			{
				height:85%;
				width:100%;
				background-size:cover;
				float:left;
			}
			
			#data_lat
			{
				width:100%;
				text-align:right;
				float:left;
				color:#eaeef1;
				height:10%;
				background-color:#000;
			}
			
			#news_con
			{
				height:50%;
				width:100%;
				float:left;
				background-color:#eaeef1;
			}
			
			.news_ele
			{
				font-family:"Adobe Gothic Std B";
				color:#000;
				float:left;
				border-bottom:#CCC;
				border-bottom-style:solid;
				border-bottom-width:medium;
				margin-top:3%;
				width:100%;
			}
			
			#gal
			{
				height:120%;
				width:100%;
				float:left;
				margin-top:5%;
			}
			
			#team
			{
				height:100%;
				width:100%;
				font-family:"Adobe Gothic Std B";
				color:#eaeef1;
				float:left;
			}
			
			.player
			{
			
				width:15%;
				background-color:#000;
				float:left;
				margin-right:5%;
				margin-bottom:5%; 
			}
			
			.pla_pic
			{
				background-color:#999;
				height:50%;
				width:100%;
				float:left;
				background-size:cover;
			}
			
			.pla_data
			{

				width:100%;
				font-family:"Adobe Gothic Std B";
				color:#FFF;
				text-align:center;
				float:left;
			}
			
			#admin_pwrd
			{
				border:medium #000 solid;
			}
			
			#admin_sub
			{
				border:#000 solid medium;
				font-family:"Adobe Gothic Std B";
				color:#FFF;
				background-color:#000;
			}
			
			#admin
			{
				float:left;
				height:30%;
				width:100%;
				font-family:"Adobe Gothic Std B";
				color:#FFF;
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
    
    <body style="background:url(../Res/ho_4.jpg) repeat center fixed; background-size:cover;">
    
    <div id="m_cont" >
   
  <!-- Brand and toggle get grouped for better mobile display -->
  
    	<div id="bar_top"  >
        	<div class="btn" id="blank"></div>
        	
        	<a href="../hpage.php" style="text-decoration:none; color:#333"><div class="btn">HOME</div></a>
        	<a href="#live" style="text-decoration:none; color:#333"><div class="btn">LIVE</div></a>
        	<a href="#news" style="text-decoration:none; color:#333"><div class="btn">LATEST</div></a>
        	<a href="#team" style="text-decoration:none; color:#333"><div class="btn">TEAM</div></a>
        	<a href="#gal" style="text-decoration:none; color:#333"><div class="btn">GALLERY</div></a>
        	<a href="../blogpage/bloghome.php" style="text-decoration:none; color:#333"><div class="btn">BLOG</div></a>
            <a href="#admin" style="text-decoration:none; color:#333"><div class="btn">ADMIN</div></a>
            
        </div>
        
        
        <div id="banner">HOCKEY</div>
            
        <div id="content">
        	<div id="live">
            	<div class="bar_div">LIVE</div>
                <div id="live_pic"></div>
		<?php
        $f = $_GET['id'];
        $data =$general->score($f);
        foreach($data as $reach)
        {
}
?>
                <div id="match_name"><?php echo $reach['homename'] ." vs " .$reach['oppname']?> </div>
                <div id="match_data">
                <p><?php echo $reach['homescore']." : ".$reach['oppscore']?></p>
                <p>National Institute Ground</p>
                <p><?php echo $reach['gametime'] ?></p>
                </div>
            </div>
            
            <div id="news">
            	<div class="bar_div">NEWS</div>
                
                
                <div id="news_lat">
                	<div id="news_pic" style="background-image:url(../Res/ho_3.JPG)"></div>
		<?php
                $f= $_GET['id'];
                $data = $general->posts($f);
                foreach($data as $reachs)
                {

}
?>
                    <div id="data_lat"><?php echo $reach['postTitle']?></div>
                </div>
                
                
                    <div id="news_con">
		<?php
                $f= $_GET['id'];
                $data = $general->posts($f);
                foreach($data as $reachs)
                {

                 echo"<div class='news_ele'>";
                    echo $reachs['postDesc'];
                    echo "</div>";
                    
                    }
?>
                    
                    </div>
                   
                </div>
                
                <div id="gal">
                <div class="bar_div">GALLERY</div>
                <div class="bs-example">
                <!--EXTERNAL CODE : GALLERY-->
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    	
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <h2>Slide 1</h2>
                <div class="carousel-caption">
                  <h3>Slide</h3>
                </div>
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
}
?>
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
                
                <div id="team">
                <div class="bar_div">TEAM</div>
                <br>
                <br>
                <br>
                <br>
	<?php
        $f= $_GET['id'];
        $data = $general->member($f);
                                                                                                                              
 foreach($data as $reach)
                {

                        echo "<div class='player'>";
                ?>
                
                	<div class="pla_pic" style="background-image:url(../uploads/<?php echo $reach['file_name'] ?>)"></div>
<?php
                 echo "  <div class='pla_data'>";
                    echo $reach['membername'];
                    echo "<br/>";
		    echo $reach['dept'];
                    echo "<br/>";
		    echo $reach['pos'];
                   echo" </div>";
                echo "</div>";
}
     ?>           
               
                                
                </div>
                
                <div id="admin">
                <div class="bar_div">ADMIN ACCESS</div>
                <br/>
                <br/>
<?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>


                <form action="" method="post">
            		Access Code :<input type="password" name="key" id="admin_pwrd" style="color:#000"/>
            		<input type="submit" value="Access" id="admin_sub"/>
			</form>
                </div>

                
                
                
            </div>
        	
        <br>

</div>
        
    </div>
    
    </body>
    
</html>
