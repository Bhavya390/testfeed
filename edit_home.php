<?php error_reporting(0);?>
<style>
body {
    background-color: #b0c4de;
} 
table, th , td  {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd)	{
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>

<?php
require('core/init.php');
$user 	= $users->teamdata($_SESSION['id']);
$admin_id = $_SESSION['id'];
if($_SESSION['id']== 0)
{
	header('Location: hpage.php');
}

$username 	= $user['Team'];
if(isset($_POST['buttonsave']))
{
	
	$membername=mysql_escape_String($_POST['member_name']);
	$dept=mysql_escape_String($_POST['department']);
	$age=mysql_escape_String($_POST['age']);
	$rollno=mysql_escape_String($_POST['rollno']);
	$postion=mysql_escape_String($_POST['position']);
	$aboutme=mysql_escape_string($_POST['aboutme']);
	$data = $users->addmember($admin_id,$membername,$age,$rollno,$dept,$postion,$aboutme);
exit();
	
}
if(isset($_POST['editvalue']))
{
	$ide1 = $_POST['id'];
	$data = $users->memberedit($admin_id,$ide1);
	header("Content-type: text/x-json");
	echo json_encode($data);
	exit();
}
//code update
if(isset($_POST['Update']))
{
	
	$name = $_POST['upname'];
	$rollno = $_POST['uprollno'];
	$age = $_POST['upage'];
	$dept = $_POST['updept'];
	$pos = $_POST['uppos'];
	$id =$_POST['upid'];
	$aboutme=$_POST['upabout'];
	$data = $users->updatemembers($id,$name,$dept,$age,$rollno,$pos,$aboutme);
	if($data)
	{
		echo "success update";
	}
}
//ends
//code delete
if(isset($_POST['deletes']))
{
	$id = $_POST['id'];
	$data = $users->deletemember($id);
}//ends
if(isset($_POST['showtable']))
{
		$data = $users->member($admin_id);
		foreach($data as $reach)
		{
		   	
		
			$name=$reach['membername'] ;
			$dept = $reach['dept'];
			$id =$reach['id_member1'];
			$age =$reach['age'];
			$rollno =$reach['rollno'];
			$pos =$reach['pos'];
			$aboutme=$reach['aboutme'];
			
			echo "<tr>
	               		<td><p>$name</p></td>
				<td><p>$rollno</p></td>
				<td><p>$dept</p></td>
				<td><p>$age</p></td>
				<td><p>$pos</p></td>
				<td><p>$aboutme</p></td>
				<td><p><a ide='$id' class ='edit' href='#?ide=$id'>Edit</a>|
				<a idd='$id' class='delete' href='#?idd=$id'>Delete</a></p></td>
			</tr>";
		       
		}	
		exit();
	}
?>
<style>
#content{
font-size:14px;
width:1000px;
background-color:#ffffcc;
border:solid 1px #000;
padding:4px;
position:absolute; overflow:hidden;
 margin-left:0%;top:100%;
}
#posts{
font-size:14px;
width:1000px;
background-color:#ffffcc;
border:solid 1px #000;
padding:4px;
position:absolute; overflow:hidden;
 margin-left:0%;top:100%;
}
#posttable{
font-size:14px;
width:1000px;
background-color:#ffffcc;
border:solid 1px #000;
padding:4px;
position:absolute; overflow:hidden;
 margin-left:0%;top:150%;
}
.cke_contents {
                height: 400px !important;
            }
#member{
font-size:14px;
width:1000px;
background-color:#ffffcc;
border:solid 1px #000;
padding:4px;
position:absolute; overflow:hidden;
margin-left:0%;top:80%;
}
#menu-bar {
  width: 95%;
  margin: 0px 0px 0px 0px;
  padding: 6px 6px 4px 6px;
  height: 40px;
  line-height: 100%;
  border-radius: 24px;
  -webkit-border-radius: 24px;
  -moz-border-radius: 24px;
  box-shadow: 2px 2px 3px #BABAA4;
  -webkit-box-shadow: 2px 2px 3px #BABAA4;
  -moz-box-shadow: 2px 2px 3px #BABAA4;
  background: #1B8DA9;
  background: linear-gradient(top,  #1B8DA9,  #1B8DA9);
  background: -ms-linear-gradient(top,  #1B8DA9,  #1B8DA9);
  background: -webkit-gradient(linear, left top, left bottom, from(#1B8DA9), to(#1B8DA9));
  background: -moz-linear-gradient(top,  #1B8DA9,  #1B8DA9);
  border: solid 1px #6D6D6D;
  position:relative;
  z-index:999;
}
#menu-bar li {
  margin: 0px 0px 6px 0px;
  padding: 0px 6px 0px 6px;
  float: left;
  position: relative;
  list-style: none;
}
#menu-bar a {
  font-weight: bold;
  font-family: arial;
  font-style: normal;
  font-size: 12px;
  color: #E7E5E5;
  text-decoration: none;
  display: block;
  padding: 6px 20px 6px 20px;
  margin: 0;
  margin-bottom: 6px;
  border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  text-shadow: 2px 2px 3px #000000;
}
#menu-bar li ul li a {
  margin: 0;
}
#menu-bar .active a, #menu-bar li:hover > a {
  background: #0399D4;
  background: linear-gradient(top,  #EBEBEB,  #A1A1A1);
  background: -ms-linear-gradient(top,  #EBEBEB,  #A1A1A1);
  background: -webkit-gradient(linear, left top, left bottom, from(#EBEBEB), to(#A1A1A1));
  background: -moz-linear-gradient(top,  #EBEBEB,  #A1A1A1);
  color: #444444;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  text-shadow: 2px 2px 3px #FFFFFF;
}
#menu-bar ul li:hover a, #menu-bar li:hover li a {
  background: none;
  border: none;
  color: #666;
  -box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
}
#menu-bar ul a:hover {
  background: #0399D4 !important;
  background: linear-gradient(top,  #04ACEC,  #0186BA) !important;
  background: -ms-linear-gradient(top,  #04ACEC,  #0186BA) !important;
  background: -webkit-gradient(linear, left top, left bottom, from(#04ACEC), to(#0186BA)) !important;
  background: -moz-linear-gradient(top,  #04ACEC,  #0186BA) !important;
  color: #FFFFFF !important;
  border-radius: 0;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  text-shadow: 2px 2px 3px #FFFFFF;
}
#menu-bar ul {
  background: #DDDDDD;
  background: linear-gradient(top,  #FFFFFF,  #CFCFCF);
  background: -ms-linear-gradient(top,  #FFFFFF,  #CFCFCF);
  background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#CFCFCF));
  background: -moz-linear-gradient(top,  #FFFFFF,  #CFCFCF);
  display: none;
  margin: 0;
  padding: 0;
  width: 185px;
  position: absolute;
  top: 40px;
  left: 0;
  border: solid 1px #B4B4B4;
  border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-box-shadow: 2px 2px 3px #222222;
  -moz-box-shadow: 2px 2px 3px #222222;
  box-shadow: 2px 2px 3px #222222;
}
#menu-bar li:hover > ul {
  display: block;
}
#menu-bar ul li {
  float: none;
  margin: 0;
  padding: 0;
}
#menu-bar ul a {
  padding:10px 0px 10px 15px;
  color:#424242 !important;
  font-size:12px;
  font-style:normal;
  font-family:arial;
  font-weight: normal;
  text-shadow: 2px 2px 3px #FFFFFF;
}
#menu-bar ul li:first-child > a {
  border-top-left-radius: 10px;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  border-top-right-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
}
#menu-bar ul li:last-child > a {
  border-bottom-left-radius: 10px;
  -webkit-border-bottom-left-radius: 10px;
  -moz-border-radius-bottomleft: 10px;
  border-bottom-right-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
  -moz-border-radius-bottomright: 10px;
}
tr:hover p
{
	-webkit-animation:enlrg 2s;
        -webkit-animation-fill-mode:forwards;
	font-weight:bold;
}
@-webkit-keyframes enlrg
{
0% {}
100% { 
 color:#F00;
-webkit-transform:scale(1.03,1.03);
}
}
#menu-bar:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#menu-bar {
  display: inline-block;
}
  html[xmlns] #menu-bar {
  display: block;
}
* html #menu-bar {
  height: 1%;
}
</style>
<head>
<title>Home Page of AnyTeam</title>

 	<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				CKEDITOR.replace( 'editor',
				{
					fullPage : true,
					uiColor : '#9AB8F3',
					toolbar : 'MyToolbar'
				});
			});
				
		</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include bootstrap stylesheets -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body style="background-color:#CCC">	
	
	<div class="container">
		<a name="top"></a><div id="main" style="overflow:auto">
		
		<ul id="menu-bar">
 
			<li class="active"><a href="#dashboard_edit">DashBoard/BLOG</a></li>
			<li><a href="#add_blog">ADD TO BLOG</a></li>
			
			<li><a href="#add_post">ADD UPDATES</a></li>
			<li><a href="#edit_post">EDIT UPDATES</a></li>
			<li><a href="#member_edit">Members</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="logout.php">Logout</a></li>
			
                       
 
		</ul>
		
	
		<h1> Welcome Admin of <?php echo $username ;?></h1><!-- This is just to display details for a specific team -->
	</div>
		<a name="add_blog">
		<div id="edit">
		<?php 
		$content = $users->dashboard($admin_id);
		foreach($content as $reach)
		{
			$con = $reach['messages'];
		}
		?>
				
    
       	 	<form action="result.php" method="post">
       		     <textarea class="editor" id="editor" name="editor" value="<?php echo $con;?>" ></textarea>
	
			<div id="messages"></div>
       		 </form>
   
		</div></a>

	<a name="member_edit"> <a href="#top">TOP</a>
	<div id ="memberadd">
	<div class="table-responsive">          
       <table class="table table-striped table-bordered">
	
	<input type = "hidden" value="" id="id"/>
	<tr>
	<td><p>MemberName</p></td>
	<td>:</td>
	<td><input type="text" id="member_name" name="member_name" value="<?php echo $data['membername'];?>" ></td>
	</tr>
	<tr>
		<td><p>Department</p></td>
		<td>:</td>
		<td><input type="text" id="department" name="department" value="<?php echo $data['dept'];?>" ></td>
	</tr>
	<tr>
		<td><p>Age</p></td>
		<td>:</td>
		<td><input type="number" id="age" name="age" value="<?php echo $data['age'];?>"></td>
	</tr>
	<tr>
		<td><p>Rollno</p></td>
		<td>:</td>
		<td><input type="text" id="rollno" name="rollno" value="<?php echo $data['rollno'];?>"></td>
	</tr>
	<tr>
		<td><p>Position</p></td>
		<td>:</td>
		<td><input type="text" id="position" name="position" value="<?php echo $data['pos'];?>"></td>
		</tr>
		
		<tr>
		<td><p>About Me</p></td>
		<td>:</td>
		<td><input type="text" id="aboutme" name="aboutme" value="<?php echo $data['aboutme'];?>"></td>
		</tr>
		
	<tr>
		<input type ="submit" id="btn" value="insert">
	</tr>
	<tr>
		<input type ="submit" id="update" value="update">
	</tr>
</table>
</div>
	</div>
<div>
<?php if(isset($_GET["result"]) && $_GET["result"] == "error"){ echo "<h3 class=\"error\">Oops! something went wrong. Please upload again</h3>"; } ?>

<?php if(isset($_GET["result"]) && $_GET["result"] == "success"){ echo "<h3 class=\"success\"> Image uploaded successfully</h3>";} ?>

<br/>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<table class="mytable">

<tr>

	<td><label>Select an image : </label></td>

	<td><input type="file" name="your_file" id="your_file" value="<?php echo $data['file_name'] ;?>"/></td>

</tr>

<tr>

	<td colspan="2"  align="center"><input type="submit" name="post_file" class="button" value="Upload This Image" /></td>
	

</tr>




</table>

</form>
</div>
	<div>
	<div class="table-responsive">          
       <table class="table table-striped table-bordered">
	<thead>
		<th><p>MemberName</p></th>
		<th><p>Rollno</p></th>
		<th><p>Department</p></th>
		<th><p>Age</p></th>
		<th><p>position</p></th>
		<th><p>About ME</p></th>
		<th></th>
		<th><p>Edit/Delete</p></th>
		
		
		
	</thead>
	<tbody id="showdata"></tbody>
	</thead>
	</table>

<?php 
		$data = $users->member($admin_id);
                echo "<div class='table-responsive'>          
       <table class='table table-striped table-bordered'>
		<tr>
		<th>Rollno</th>
		<th>Imageurl</th>
		<th>Action</th>
		</tr>";
		foreach($data as $reach)
		{
		   	
		      echo "<tr>";
	              echo "<td><p>".$reach['rollno']."</p></td>";
		      echo "<td><p>".$reach['file_name']."</p></td>";
		      echo "<td>";
			echo '<div >';
			echo "<a href='updatepic.php?id=".$reach['id_member1']."'><input type='button'  name='edit' value='Updatepic'></a>";
			echo '</div>';
			echo "</td>";
			
		}
                   
		 echo "</table>";
		echo "</div>";
?>
	</div>
</div>

	</a>


<div>
<a name="dashboard_edit"><a href="#top">TOP</a>
<?php
$content = $users->dashboard($admin_id);
echo "<div class='table-responsive'>          
       <table class='table table-striped table-bordered'>
		<tr>
		<th>content</th>
		<th>Action_delete</th>
		</tr>";
		
               
		foreach($content as $reach)
		{
		   	
		     	
			echo "<tr>";
			echo "<td> <p>".$reach['messages']."</p></td>";
			echo "<td>";
			echo '<div >';
			echo "<a href='deleteblog.php?id=".$reach['comment_id']."'><input type='button'  name='delete' value='Delete'></a>";		
			echo '<div >';
			echo "<td>";
			echo "</tr>";
			
		}
                   
		 echo "</table>";
		echo"</div>";
?>



</div></a>
<a name="add_post"><a href="#top">TOP</a>
<div>

<head>

<script type="text/javascript" src="js/wysiwyg.js"></script>

</head>

<body onload="iFrameOn();">

<form action="post.php" name="myform" id="myform" method="post">

<p>Enter Title:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="postTitle" id="postTitle" size="80" maxlength="80"/></p>

<p>Enter Description:&nbsp&nbsp<input type="text" name="postDesc" id="postDesc" size="80" maxlength="80"/></p>

<p>Enter Body:<br>

<div id="wysiwyg_cp" style="padding:8px; width:700px;">

	<input type="button" onclick="iBlod()" value="B">

	<input type="button" onclick="iUnderline()" value="U">

	<input type="button" onclick="iItalic()" value="I">

	<input type="button" onclick="iFrontSize()" value="Text Size">

	<input type="button" onclick="iForeColor()" value="Text Color">

	<input type="button" onclick="iHorizontalRule()" value="HR">

	<input type="button" onclick="iUnorderedList()" value="UL">

	<input type="button" onclick="iOrderedList()" value="OL">

	<input type="button" onclick="iLink()" value="Link">

	<input type="button" onclick="iUnLink()" value="UnLink">

	

</div>

	

	

<!--Hide your normal textarea and place in the iframe replacment for it-->

<textarea style="display:none;" name="postCont" id="postCont" cols="100" rows="14"></textarea>

<iframe name="richTextField" id="richTextField" style="border:#000000 2px solid; width:700px; height:300px;"></iframe>

</p><br>

<input name="myBtn" type="button" value="Submit Data" onclick="javascript:submit_form();"/>

</form>

</body>
</div></a>
<a name="edit_post">
<div id="display1">
<?php 
		$data = $users->posts($admin_id);

                echo "<div class='table-responsive'>          
       <table class='table table-striped table-bordered'>
		<tr>
		<th>postTitle</th>
		<th>postDesc</th>
		<th>postDate</th>
		<th>Edit_Action</th>
		<th>Delete_Action</th>
		</tr>";
		
               
		foreach($data as $reach)
		{
		   	if(isset($reach['postTitle']))
		   	{
		      echo "<tr>";
	              echo "<td><p>".$reach['postTitle']."</p></td>";
		      echo "<td><p>".$reach['postDesc']."</p></td>";
		      echo "<td><p>".$reach['postDate']."</p></td>";
		      echo "<td><p>";
			echo '<div >';
			echo"<a href='textedit.php?id=".$reach['postID']."'><input type='button' id='edit' name='edit' value='Edit'></a>";
			echo "</p></td>";
			echo "<td><p>";
			echo "<a href='delete.php?id=".$reach['postID']."'><input type='button'  name='delete' value='Delete'></a>";
			
			echo '</div>';
			echo "</p></td>";
		      echo "</tr>";
		  }
			/*echo "<tr>";
			echo "<td>".$reach['message']."</td>";
			echo "</tr>";*/
			
		}
                   
		 echo "</table>";
		echo "</div>";
		
		//$r=mysql_fetch_assoc($row)
		
		//$r = $users->fetchAll($data);
		//echo $r."hi";
		//$data = $query->fetch();
		//$reaches = $users->fetchAll($data);
		
		
?><a href="#top">TOP</a>

</div></a>

<?php
if($_SESSION['id']!=9)
{
?>
<div>
<form action="score.php" method="post">
<div class="table-responsive">          
       <table class="table table-striped table-bordered">
<tr>
<td><input type="number" name="homescore"id="homescore" value="home_score" ></td>
<td><input type ="text" name="homename" id="homename"value="home_name"></td>
<td><input type="number" name="oppscore" id="oppsore"value="opp_score"></td>
<td><input type="text" name="oppname" id="oppname"value="opp_name"></td>
<td><input type="text" name="gametime" id="gametime" ></td>
<td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</div>
</form>
</div>


<div id="display1">

<?php 
		$data = $users->scoreshow($admin_id);
                echo "<div class='table-responsive'>          
       <table class='table table-striped table-bordered'>
		<tr>
		<th>Home_Score</th>
		<th>Home_Name</th>
		<th>Opp_Score</th>
		<th>Opp_Name</th>
		<th>Gametime</th>
		<th>Edit_Action</th>
		<th>Delete_Action</th>
		</tr>";
		
                
               
		foreach($data as $reach)
		{
			echo "<tr>";
			echo "<td><p>".$reach['homescore']."</td></p>";
			echo "<td><p>".$reach['homename']."</td></p>";
			echo "<td><p>".$reach['oppscore']."</td></p>";
			echo "<td><p>".$reach['oppname']."</td></p>";
			echo "<td><p>".$reach['scoredate']."</td></p>";
			echo "<td><p>";
			echo '<div >';
			echo "<a href='scoreedit.php?id=".$reach['score_id']."'><input type='button' id='edit' name='edit' value='Edit'></a>";
			echo "</p></td>";
			echo "<td><p>";
			echo "<a href='deletescore.php?id=".$reach['score_id']."'><input type='button' id='delete'  name='delete' value='Delete'></a>";
			
			echo '</div>';
			echo "</p></td>";
			echo "</tr>";
			
		}
echo "</table>";
echo"</div>";
?>
</div>
</div>
</div>
<?php } 
else if($_SESSION['id']==9)
{
?>
<div>
<form action="crikscore.php" method="post">
<div class="table-responsive">          
       <table class="table table-striped table-bordered">
<tr>
	<td>HOME</td>
	<tr><td>name</td><td><input type ="text" name="homename" id="homename"></td></tr>
<td>Runs</td><td><input type="text" name="homeruns" id="homeruns"  ></td></tr>
<tr><td>wickets</td><td><input type="text" name="homewickets" id="homewickets" ></td></tr>
<tr><td>Points_to_win</td><td><input type="text" name="hometowin" id="hometowin" ></td></tr>
<td>AWAY</td>
<tr><td>name</td><td><input type="text" name="oppname" id="oppname"></td></tr>
<tr><td>Runs</td><td><input type="text" name="oppruns" id="oppruns"></td></tr>
<tr><td>wickets</td><td><input type="text" name="oppwickets" id="oppwickets" ></td></tr>
<tr><td>Points_to_win</td><td><input type="text" name="opptowin" id="opptowin"></td></tr>
<tr><td><input type="submit" name="submit" value="EDIT"></td></tr>
</tr>
</table>
</div>
</form>
</div>
<div id="display1">

<?php 
		$data = $users->cricscoreshow($admin_id);
                echo "<div class='table-responsive'>          
       <table class='table table-striped table-bordered'>
		<tr>
		<th>homename</th>
		<th>runs</th>
		<th>wickets</th>
		<th>Points_to_win</th>
		<th>Awayteam</th>
		<th>runs</th>
		<th>wickets</th>
		<th>Points_to_win</th>
		<th>Edit_Action</th>
		<th>Delete_Action</th>
		</tr>";
		
       //  $array = explode(" ",$data['postCont']);

		foreach($data as $reach)
		{
			echo "<tr>";
			//echo "<td><p>".$reach['postCont']."</td></p>";
			$array = explode(" ",$reach['postCont']);
			foreach($array as $e)
			{
				
				echo "<td><p>".$e."</td></p>";

			}
			echo "<td><p>";
			echo '<div >';
			echo "<a href='cricscoreedit.php?id=".$reach['postID']."'><input type='button' id='edit' name='edit' value='Edit'></a>";
			echo "</p></td>";
			echo "<td><p>";
			echo "<a href='cricdeletescore.php?id=".$reach['postID']."'><input type='button' id='delete'  name='delete' value='Delete'></a>";
			
			echo '</div>';
			echo "</p></td>";
			echo "</tr>";
		}
echo "</table>";
echo"</div>";
?>
</div>
</div>
<?php
}?>
</body>
<script type="text/javascript">
$(function(){
	showdata();
	//create ajax update
		$('#update').click(function(){
			var id = $('#id').val()-0;
			var name =$('#member_name').val();
			var rollno =$('#rollno').val();
			var dept =$('#department').val();
			var age =$('#age').val();
			var position =$('#position').val();
			var aboutme =$('#aboutme').val();
			//alert(aboutme);
			$.ajax({
				url 	: "addmember.php",
				type	: "POST",
				async	: false,
				data 	: {
						Update 		: 1,
						upid 		: id,
						upname 		: name,
						uprollno 	: rollno,
						updept 		: dept,
						upage 		: age,
						uppos 		: position,
						upabout     : aboutme
						
					},
				success:function(up)
				{
					//alert(up);
					alert("success update");
					$('input[type=text]').val('');
					$('#age').val('');
					showdata();
				}
		});
		});
	//end ajax
	//delte record
	$('body').delegate('.delete','click',function(){
		var IdDelete = $(this).attr('idd');
		var test= window.confirm("DO YOU WANT TO DELETE THIS RECORD")
		if(test)
		{
		{
			$.ajax({
				url 	: "addmember.php",
				type	: "POST",
				async	: false,
				data 	: {
					deletes : 1,
					id     : IdDelete
					},
				success:function(){
				alert("Success Delete");
				showdata();
				}
				});
		}
		}
	});
	$('body').delegate('.edit','click',function(){
		var IdEdit = $(this).attr('ide');
		
		$.ajax({
				url		: "addmember.php",
				type 		: "POST",
				datatype 	: "JSON",
				data  		: {
							editvalue : 1,
							id         : IdEdit
					 	   },
				success : function(show)
				{
					$('#id').val(show.id_member1);
					$('#member_name').val(show.membername);
					$('#department').val(show.dept);
					$('#age').val(show.age);
					$('#rollno').val(show.rollno);
					$('#position').val(show.pos);
					$('#aboutme').val(show.aboutme);
				}
			});
	});
$('#btn').click(function()
{
var name = $('#member_name').val();
var dept =$('#department').val();
var ageof = $('#age').val(); 
var rollnum =$('#rollno').val();
var pos =$('#position').val();
var aboutme =$('#aboutme').val();
//var datastring ='member_name='+name+'department='+dept+'age='+age+'rollno='+rollno+'position='+position;
if(name.length>0&&dept.length > 0&& ageof.length > 0&& rollnum.length > 0&& pos.length >0 && aboutme.length>0)
{
$.ajax({
	type :  "POST",
	url  : "addmember.php",
	async: false,
	data :	{
 		buttonsave : 1,
		member_name : name,
		department : dept,
		age : ageof,
		rollno : rollnum,
		position : pos,
		aboutme :aboutme
		
		},
success : function(result)
{
	alert("member is added");
	showdata();
	header('Location: edit_home.php');			
}
});
}
else
{
	alert("Enter the fields");
	//$("#member_name").focus();
}
	});
})
function showdata ()
{
	$.ajax({
		type  : "POST",
		url   : "addmember.php",
		async : false,
		data  : { 
				showtable : 1
			},
		success : function (re)
		{
		$('#showdata').html(re);	
		}
	});
}
</script>

<?php
$data = $users->member($admin_id);
foreach($data as $reach)
{
	$con = $reach['id_member1'];
}
	
if(isset($_POST["post_file"])){
	if($_POST["post_file"] != ""){
		$valid_files = array("png", "jpg", "gif"); // include the valid image file extensions
		$file_name	 = $_FILES["your_file"]["name"]; // get the image name you posting
		$file_name_exp = explode(".", $file_name); // explode the uploaded image to get extension
		$file_extension = $file_name_exp[1]; // get extension
		if(in_array($file_extension, $valid_files)){ // check that image is valid or not
			$change_file_name = strtolower(str_replace(" ", "_", $file_name_exp[0])); // change the image name
			$file_name		  = $change_file_name.".".$file_extension; // join the new image name and its extension
			$folder_name	  = "uploads/"; // get the directory name which you want to upload the image make sure this directory has 0755 permision
			$target			  = $folder_name.$file_name; 
			$temp_name		  = $_FILES["your_file"]["tmp_name"]; // get the temp name of the image
			$move			  = move_uploaded_file($temp_name, $target); // move_uploaded_file function will let us to copy the file from your local drive to your root directory
			if($move){
				 $r = $users->uploadPhoto($file_name,$con);
				//mysql_query("INSERT INTO `upload` (file_name, post_date) VALUES ('$file_name', now())");
				echo "<script type=\"text/javascript\">window.location = 'upload1.php?result=success';</script>";	
			}else{
				echo "<script type=\"text/javascript\">window.location = 'edit_home.php?result=error';</script>";	
			}
		}else{
			echo "<script type=\"text/javascript\">window.location = 'edit_home.php?result=error';</script>";	
		}
	}else{
		echo "<script type=\"text/javascript\">window.location = 'edit_home.php?result=error';</script>";	
	}
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>





	


