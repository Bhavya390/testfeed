<?php



	require ('core/init.php');
	$admin_id= $_SESSION['id'];
	$pos_id=$_GET['id'];
	$data = $users->text($pos_id);
	$title = $data['postTitle'];
	$desc = $data['postDesc'];
	$con = $data['postCont'];
	

	?>

<html>

<head>

<script type="text/javascript" src="js/wysiwyg.js"></script>

</head>

<body onload="iFrameOn();">

<form action=<?php echo"update.php?id=".$pos_id; ?> name="myform" id="myform" method="post">

<p>Enter Title:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="postTitle" id="postTitle" value="<?php echo $title ?>" size="80" maxlength="80"/></p>

<p>Enter Description:<input type="text" name="postDesc" id="postDesc" value="<?php echo $desc ?>" size="80" maxlength="80"/></p>

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
<textarea style="display:none;" name="postCont" id="postCont" cols="100" rows="14"><?php echo $con ?></textarea>

<iframe name="richTextField" id="richTextField" style="border:#000000 2px solid; width:700px; height:300px;"></iframe>

</p><br>


<input name="myBtn" type="button" value="Update Data" id="<?php $pos_id ?>" onclick="javascript:submit_form();"/>

</form>

</body>

</html>
