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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>BADMINTON</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
      
        <div class="navbar-header">
	    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </a>
        <a class="navbar-brand" href="#">Badminton</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../hpage.php">Home</a></li>
            <li><a href="#member">Members</a></li>
            <li><a href="#news">LatestNews</a></li>
            <li><a href="#match">Matchs</a></li>
            <li><a href="../blogpage/bloghome.php">Blog</a></li>
           <!-- <li><a href="#">AdminLogin-->
              <?php if(empty($errors) === false){

                        echo '<p>' . implode('</p><p>', $errors) . '</p>';

                }
                ?>
                  <li id="admin_btn"><a href="#">AdminLogin</a></li>
            <li>
            <div id="admin_bar" style="visibility:hidden">
            <form action="" method="post">
             <input type="password" name="key" id="admin" style="width:60%; margin-top:4%" />
                <input type="submit" value="LogIn" class="btn" style="margin-top:2.5%"/>
             </form>
             </div>    
            <!--<form action="" method="post">
             </br>
             <input type="password" name="key" id="admin" style="width:100%" />
                <input type="submit" value="LogIn" class="btn"/>
             </form>
           </a>-->
            </li>
          </ul>
        </div>
    </div>
  </div><!-- /container -->
</div><!-- /navbar wrapper -->


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/badminton3.jpg" style="width:100%" class="img-responsive">
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
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<!-- /.carousel -->



<!-- Wrap the rest of the page in another container to center all the content. members info -->

<a name="member">
<div class="container member">
  <?php
  $f=$_GET['id'];
  $data = $general->member($f);
  foreach($data as $reach)
  {
    echo "<div class='row'>";
    echo "<div class='col-md-4 text-center'>";
  ?>
    <img class="img-circle" src="../uploads/<?php echo $reach['file_name'] ?>" style="width:50%" >
    <?php
    echo "<h2>".$reach['membername']."</h2>";
    echo "<p>".$reach['dept']."  ".$reach['pos']. "</p>";
    echo "</div>";
  }
    ?>
  </div><!-- /.row -->
</a>

  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <a name="news">
    <div class="row1">
            <div class="box">
              <?php
              $f=$_GET['id'];
              $data=$general->posts($f);
              foreach($data as $reach)
              {
              ?>
              
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php echo $reach['postTitle']?>
                    </h2>
                    <hr>
                </div>
  
                <div class="col-lg-12 text-center">
                   <h2>Posted On
                        <br>
                        <small><?php echo $reach['postDate']?></small>
                    </h2>
                    <p><?php echo $reach['postDesc']?></p>
                    <p><?php echo $reach['postCont']?></p>
                    
                </div>
              
                <?php
}?>
                
            </div>
        </div>
  </div>
</a>
  <hr class="featurette-divider">
<a name="match">
  <div class="featurette">
    <?php
              $f=$_GET['id'];
              $data=$general->gallery($f);
              foreach($data as $reach)
              {
              }

              ?>
    <img class="featurette-image img-circle pull-left" src="../uploads/<?php echo $reach['file_name'] ?>" style="width:50%">
    <h2 class="featurette-heading">LatestMatch <span class="text-muted"></span></h2>
    <?php
    $f=$_GET['id'];
    $data=$general->score($f);
    //foreach($data as $reach)
    //{
    //}
    ?>
    <p class="lead"><?php echo "<span>".$data['oppname']."  " .$data['oppscore']."-" .$data['homename']." ".$data['homescore']."</span>"?> <?php echo "<span style='text-align:center; font-size:36px'>".$reach['gametime']."</span>" ?></p>

  </div>
</a>

  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
  </footer>

</div><!-- /.container -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
   <script>
  
  var btn=document.getElementById("admin_btn");
  var box=document.getElementById("admin_bar");
  
  btn.onclick=function(){
    if(box.style.visibility=="hidden")
    box.style.visibility="visible";
    else
    box.style.visibility="hidden";
  };
  $(document).scroll(function(e){
    var scrollTop = $(document).scrollTop();
    if(scrollTop > 0){
        console.log(scrollTop);
        $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
    }
});
  </script>
</html>