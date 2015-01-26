<html>
<style>
#main
{
	width: 1000px; height:1000px;
	padding right: 25px;
	/*background: rgba(45,78,90,0.3); */
  
	margin: 50px auto 0 110px; position:absolute;
}
</style>
<div class="container">
<div class="main">
<form  method="post" name="form" action="">
<p>Membername: &nbsp<input type="text" value="" name="Membername" id="Membername"/></br></p>
<p>Age:&nbsp &nbsp &nbsp<input type="text" value="" name="Age" id="Age"/></br></p>
<p>Rollno:&nbsp &nbsp &nbsp<input type="text" value="" name="Rollno" id="Rollno"/></br></p>
<p>Department:&nbsp &nbsp<input type="text" value="" name="Dept" id="Dept"/></br></p>
<p>Position:&nbsp &nbsp<input type="text" value="" name="Pos" id="Pos"/></br></p>
<p>Otherinfo:&nbsp<textarea style="width:500px; font-size:14px; height:60px; font-weight:bold; resize:none;" name="content" id="content" ></textarea><br /></p>
<input type="submit" value="Post" name="submit" class="submit_button"/>
</form>
</div>
<div class="space"></div>
<div id="flash"></div>
<div id="show"></div>
</div>
</html>
