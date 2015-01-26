
<?php
require('core/init.php');
$admin_id = $_SESSION['id'];

if($_SESSION['id']==0)
{
	print '<script type="text/javascript">';
	print 'alert("You are not allowed to login in")';
	print '</script>';
	header('Location:sportsfete.php');
}
if(isset($_POST['textme']))
{
	$text = mysql_escape_string(($_POST['text']));
	$live =$users->livesports($admin_id,$text);
	exit();
}
if(isset($_POST['editvaluem']))
{
	$idet = $_POST['id'];
	$message =$users->liveedit($admin_id,$idet);
	header("Content-type: text/x-json");
	echo json_encode($message);
	exit();
}
if(isset($_POST['upmess']))
{
	$id= $_POST['uptextid'];
	$text = $_POST['uptext'];
	$message = $users->liveupdate($text,$id);
	if($message)
	{
		echo "success update";
	}
}
if(isset($_POST['deletesm']))
{
$id = $_POST['id'];
$users->livedelete($id);	
}

if(isset($_POST['save']))
{
			$Dept = mysql_escape_string($_POST['Dept']);
			 $cric_score = mysql_escape_string($_POST['cric_score']);
		 $foot_score = mysql_escape_string($_POST['foot_score']);
		 $basket_score = mysql_escape_string($_POST['basket_score']);
		 $volley_score = mysql_escape_string($_POST['volley_score']);
		 $kabbaddi_score = mysql_escape_string($_POST['kabbaddi_score']);
		 $tennis_score = mysql_escape_string($_POST['tennis_score']);
		  $tt_score = mysql_escape_string($_POST['tt_score']);
		 $badminton_score = mysql_escape_string($_POST['badminton_score']);
		 $hockey_score = mysql_escape_string($_POST['hockey_score']);
		 $carrom_score = mysql_escape_string($_POST['carrom_score']);
		 $chess_score = mysql_escape_string($_POST['chess_score']);
		 $handball_score = mysql_escape_string($_POST['handball_score']);
		  $khokho_score = mysql_escape_string($_POST['khokho_score']);
		 $athletics_score = mysql_escape_string($_POST['athletics_score']);
		 $throw_score = mysql_escape_string($_POST['throw_score']);
		 $waterpolo_score = mysql_escape_string($_POST['waterpolo_score']);
		 $swimming_score =mysql_escape_string($_POST['swimming_score']);
		 $total_score = mysql_escape_string($_POST['total_score']);
		 $insert = $users->sportsfete($admin_id,$Dept,$cric_score,$foot_score,$basket_score,$volley_score,
		 	$khokho_score,$kabbaddi_score,$tennis_score,$tt_score,$hockey_score,$badminton_score,$carrom_score,$chess_score,$handball_score,$athletics_score,
		 	$throw_score,$waterpolo_score,$swimming_score,$total_score);
		 exit();
}
if(isset($_POST['editvalue']))
{
	$ide1 = $_POST['id'];
	$data = $users->sportsedit($admin_id,$ide1);
	header("Content-type: text/x-json");
	echo json_encode($data);
	exit();
}
//code update
if(isset($_POST['Update']))
{
	$id = $_POST['upid'];
	$Dept = $_POST['upDept'];
		$cric_score = $_POST['upcric_score'];
		 $foot_score = $_POST['upfoot_score'];
		 $basket_score = $_POST['upbasket_score'];
		 $volley_score = $_POST['upvolley_score'];
		 $kabbaddi_score = $_POST['upkabbaddi_score'];
		 $tennis_score = $_POST['uptennis_score'];
		  $tt_score = $_POST['uptt_score'];
		 $badminton_score = $_POST['upbadminton_score'];
		 $hockey_score = $_POST['uphockey_score'];
		 $carrom_score = $_POST['upcarrom_score'];
		 $chess_score = $_POST['upchess_score'];
		 $handball_score = $_POST['uphandball_score'];
		  $khokho_score = $_POST['upkhokho_score'];
		 $athletics_score = $_POST['upathletics_score'];
		 $throw_score = $_POST['upthrow_score'];
		 $waterpolo_score = $_POST['upwaterpolo_score'];
		 $swimming_score =$_POST['upswimming_score'];
		 $total_score = $_POST['uptotal_score'];
	$data = $users->updatesports($id,$Dept,$cric_score,$foot_score,$basket_score,$volley_score,$kabbaddi_score,$tennis_score,$tt_score,$badminton_score,$hockey_score
		,$carrom_score,$chess_score,$handball_score,$khokho_score,$athletics_score,$throw_score,$waterpolo_score,$swimming_score,$total_score);
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
	$data = $users->deletesports($id);
}//ends
if(isset($_POST['show']))
{

		$data = $users->showsports($admin_id);
		foreach($data as $reach)
		{
			$id = $reach['id'];
		   	$Dept = $reach['dept'];
			 $cric_score = $reach['cricket'];
		 $foot_score = $reach['Football'];
		 $basket_score = $reach['Basketball'];
		 $volley_score = $reach['Volleyball'];
		 $kabbaddi_score = $reach['Kabbaddi'];
		 $tennis_score = $reach['Tennis'];
		  $tt_score = $reach['Tt'];
		 $badminton_score = $reach['Badminton'];
		 $hockey_score = $reach['Hockey'];
		 $carrom_score = $reach['Carrom'];
		 $chess_score = $reach['Chess'];
		 $handball_score = $reach['Handball'];
		  $khokho_score = $reach['Khokho'];
		 $athletics_score = $reach['Athletics'];
		 $throw_score = $reach['Throwball'];
		 $waterpolo_score = $reach['Waterpolo'];
		 $swimming_score =$reach['Swimming'];
		 $total_score = $reach['Total'];
		
			echo "<tr>
	               		<td><p>$Dept</p></td>
				<td><p>$cric_score</p></td>
				<td><p>$foot_score</p></td>
				<td><p>$basket_score</p></td>
				<td><p>$volley_score</p></td>
				<td><p>$kabbaddi_score</p></td>
				<td><p>$tennis_score</p></td>
				<td><p>$tt_score</p></td>
				<td><p>$badminton_score</p></td>
				<td><p>$hockey_score</p></td>
				<td><p>$carrom_score</p></td>
				<td><p>$chess_score</p></td>
				<td><p>$handball_score</p></td>
				<td><p>$khokho_score</p></td>
				<td><p>$athletics_score</p></td>
				<td><p>$throw_score</p></td>
				<td><p>$waterpolo_score</p></td>
				<td><p>$swimming_score</p></td>
				<td><p>$total_score</p></td>	
				<td><p><a ide='$id' class ='edit' href='#?ide=$id'>Edit</a></p></td>
				<td><p><a idd='$id' class='delete' href='#?idd=$id'>Delete</a></p></td>
			</tr>";
		       
		}	
		exit();
	}
	if(isset($_POST['show1']))
{
	$message = $users->liveshow();
	foreach($message as $reach)
	{
		$id = $reach['idm'];
		$text = $reach['txtmessage'];
		echo "<tr>
	               		
				<td><p>$text</p></td>	
				<td><p><a ide1='$id' class ='editm' href='#?ide1=$id'>Edit</a></p></td>
				<td><p><a idd1='$id' class='deletem' href='#?idd1=$id'>Delete</a></p></td>
			</tr>";

	}
	exit();
}
?>
<title> Edit</title>
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sports.css">

<style type="text/css">
	#table_in
	{
		border-color: rgba(0,0,0,0.5);
		border-width: 2px;
		background-color: rgba(0,0,0,0.5);
		color: #FFF;
	}
</style>

<body>
<table border='1' id="table_in">

	<input type = "hidden" value="" id="id"/>
	<tr>
		<td><p>DEPARTMENT</p></td>
			<td>:</td>
			<td>
			<select id="Dept">
				<option value="default">SELECT</option>
				<option <?php if($data['dept']== 'cse') echo 'selected';?>value="cse">CSE</option>
				<option <?php if($data['dept']== 'ece') echo 'selected';?>value="ece">ECE</option>
				<option <?php if($data['dept'] == 'ice') echo 'selected';?>value="ice">ICE</option>
				<option <?php if($data['dept']== 'mech') echo 'selected';?>value="mech">MECH</option>
				<option <?php if($data['dept']=='prod') echo 'selected';?>value="prod">PROD</option>
				<option <?php if($data['dept'] == 'Chem') echo 'selected';?>value="Chem">CHEM</option>
				<option <?php if($data['dept'] == 'Civil') echo 'selected';?>value="Civil">CIVIL</option>
				<option <?php if($data['dept'] == 'eee') echo 'selected';?>value="eee">EEE</option>
				<option <?php if($data['dept'] == 'mme') echo 'selected';?>value="mme">MME</option>			
			</select>
		</td>
	</tr>
	<tr>
		<td><p>CRICKET</p></td>
		<td>:</td>
		<td>
			<input type="text" id="cric_score" name="cric_score"  value="<?php echo $data['cricket'];?>" />
		</td> 
	</tr>
	<tr>
		<td><p>FOOTBALL</td>
		<td>:</td>
		<td>
			<input type="text" id="foot_score" name="foot_score"  value="<?php echo $data['Football'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>BASKETBALL</p></td>
		<td>:</td>
		<td>
			<input type="text" id="basket_score" name="basket_score"  value="<?php echo $data['Basketball'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>VOLLEYBALL</p></td>
		<td>:</td>
		<td>
			<input type="text" id="volley_score" name="volley_score" value="<?php echo $data['Volleyball'];?>"  />
		</td>
	</tr>
	<tr>
		<td><p>KABBADDI</p></td>
		<td>:</td>
		<td>
			<input type="text" id="kabbaddi_score" name="kabbaddi_score"  value="<?php echo $data['Kabbaddi'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>TENNIS</p></td>
		<td>:</td>
		<td>
			<input type="text" id="tennis_score" name="tennis_score"  value="<?php echo $data['Tennis'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>TT</p></td>
			<td>:</td>
		<td>
			<input type="text" id="tt_score" name="tt_score"   value="<?php echo $data['Tt'];?>"/>
		</td>
	</tr>
	<tr>
		<td><p>BADMINTON</p></td>
		<td>:</td>
		<td>
			<input type="text" id="badminton_score" name="badminton_score"  value="<?php echo $data['Badminton'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>HOCKEY</p></td>
		<td>:</td>
		<td>
			<input type="text" id="hockey_score" name="hockey_score"  value="<?php echo $data['Hockey'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>CARROM</p></td>
		<td>:</td>
		<td>
			<input type="text" id="carrom_score" name="carrom_score"  value="<?php echo $data['Carrom'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>CHESS</p></td>
		<td>:</td>
		<td>
			<input type="text" id="chess_score" name="chess_score"   value="<?php echo $data['Chess'];?>"/>
		</td>
	</tr>
	<tr>
		<td><p>HANDBALL</p></td>
		<td>:</td>
		<td>
			<input type="text" id="handball_score" name="handball_score"  value="<?php echo $data['Handball'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>KHOKHO</p></td>
		<td>:</td>
		<td>
			<input type="text" id="khokho_score" name="khokho_score"  value="<?php echo $data['Khokho'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>ATHLETICS</p></td>
		<td>:</td>
		<td>
			<input type="text" id="athletics_score" name="athletics_score"  value="<?php echo $data['Swimming'];?>" />
		</td>
	</tr>
	<tr>
		<td><p>THROWBALL</p></td>
		<td>:</td>
		<td>
			<input type="text" id="throw_score" name="throw_score"   value="<?php echo $data['Throwball'];?>"/>
		</td>
	</tr>
	<tr>
		<td><p>WATERPOLO</p></td>
		<td>:</td>
		<td>
			<input type="text" id="waterpolo_score" name="waterpolo_score"   value="<?php echo $data['Waterpolo'];?>"/>
		</td>
	</tr>
	<tr>
		<td><p>SWIMMING</p></td>
		<td>:</td>
		<td>
			<input type="text" id="swimming_score" name="swimming_score"   value="<?php echo $data['Swimming'];?>"/>
		</td>
	</tr>
	<tr>
		<td><p>TOTAL</p></td>
		<td>:</td>
		<td>
			<input type="text" id="total_score" name="total_score"  value="<?php echo $data['Total'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" id="sub" name="sub" value="insert" />
		</td>
		<td>
		</td>
		<td>
			<input type="submit" id="update" name="update" value="update"/>
		</td>
	</tr>
	</tr>
</table>
<div>
	<div class="table-responsive">          
       <table border="1">
	<thead>
		<th><p>DEPARTMENT</p></th>
		<th><p>CRICKET</p></th>
		<th><p>FOOTBALL</p></th>
		<th><p>BASKETBALL</p></th>
		<th><p>VOLLEYBALL</p></th>
		<th><p>KABBADDI</p></th>
		<th><p>TENNIS</p></th>
		<th><p>TTSCORE</p></th>
		<th><p>BADMINTON</p></th>
		<th><p>HOCKEY</p></th>
		<th><p>CARROM</p></th>
		<th><p>CHESS</p></th>
		<th><p>HANDBALL</p></th>
		<th><p>KHOKHO</p></th>
		<th><p>ATHLETICS</p></th>
		<th><p>THROWBALL</p></th>
		<th><p>WATERPOLO</p></th>
		<th><p>SWIMMING</p></th>
		<th><p>TOTAL</p></th>
		<th><p>Edit</p></th>
		<th><p>Delete</p></th>
	
	<tbody id="showdata"></tbody>
	</thead>
	</table>
	
	<div id="showmessage">
		
	</div>

	<div>
		<p>LIVE UPDATES</p>
		<input type = "hidden" value="" id="idmess"/>
		<textarea name="txtmessage" id="txtmessage" cols="80" rows="5"></textarea>
		<p><input type="submit" id="textsub" name="textsub" value="insert"/>
		<input type="submit" id="textup" name="textup" value="update"/></P>
	</div>
	
</body>
<script type="text/javascript">
$(function(){
	showdata();
	showmessage();
	$('#update').click(function(){
			var id = $('#id').val()-0;
			var Dept = $('#Dept').val();
		var cric_score = $('#cric_score').val();
		var foot_score = $('#foot_score').val();
		var basket_score = $('#basket_score').val();
		var volley_score = $('#volley_score').val();
		var kabbaddi_score = $('#kabbaddi_score').val();
		var tennis_score = $('#tennis_score').val();
		var  tt_score = $('#tt_score').val();
		var badminton_score = $('#badminton_score').val();
		var hockey_score = $('#hockey_score').val();
		var carrom_score = $('#carrom_score').val();
		var chess_score = $('#chess_score').val();
		var handball_score = $('#handball_score').val();
		var  khokho_score = $('#khokho_score').val();
		var athletics_score = $('#athletics_score').val();
		var throw_score = $('#throw_score').val();
		var waterpolo_score = $('#waterpolo_score').val();
		var swimming_score =$('#swimming_score').val();
		var total_score=$('#total_score').val();
		//alert(total_score);
	//	var total_score = cric_score + foot_score + basket_score + volley_score + khokho_score +kabbaddi_score +tennis_score+tt_score+badminton_score+hockey_score+handball_score+chess_score+carrom_score+athletics_score+throw_score+waterpolo_score+swimming_score;
			$.ajax({
				url 	: "sportsfeteedit.php",
				type	: "POST",
				async	: false,
				data 	: {
						Update 		: 1,
						upDept : Dept,
						upid:id,
						upcric_score:cric_score,
						upfoot_score:foot_score,
				upchess_score :chess_score,
				upcarrom_score: carrom_score,
				upcric_score:cric_score,
				upkhokho_score:khokho_score,
				upkabbaddi_score:kabbaddi_score,
				uphockey_score:hockey_score,
				uphandball_score:handball_score,
				upathletics_score:athletics_score,
				upwaterpolo_score:waterpolo_score,
				upfoot_score:foot_score,
				upvolley_score:volley_score,
				upbasket_score:basket_score,
				upbadminton_score:badminton_score,
				upthrow_score:throw_score,
				uptennis_score:tennis_score,
				uptt_score:tt_score,
				upswimming_score:swimming_score,
				uptotal_score:total_score
						
					},
				success:function(up)
				{
					//alert(up);
					alert("success update");
					$('input[type=text]').val('');
					//$('#total_score').val('');
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
				url 	: "sportsfeteedit.php",
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
				url		: "sportsfeteedit.php",
				type 		: "POST",
				datatype 	: "JSON",
				data  		: {
							editvalue : 1,
							id         : IdEdit
					 	   },
				success : function(show)
				{
					 $('#id').val(show. id);
					$('#Dept').val(show.dept);
					$('#cric_score').val(show.cricket);
					$('#foot_score').val(show.Football);
					$('#basket_score').val(show.Basketball);
					$('#volley_score').val(show.Volleyball);
					$('#kabbaddi_score').val(show.Kabbaddi);
					$('#tennis_score').val(show.Tennis);
					$('#tt_score').val(show.Tt);
					$('#badminton_score').val(show.Badminton);
					$('#hockey_score').val(show.Hockey);
					$('#carrom_score').val(show.Carrom);
					$('#chess_score').val(show.Chess);
					$('#handball_score').val(show.Handball);
					$('#khokho_score').val(show.Khokho);
					$('#athletics_score').val(show.Athletics);
					$('#throw_score').val(show.Throwball);
					$('#waterpolo_score').val(show.Waterpolo);
					$('#swimming_score').val(show.Swimming);
					$('#total_score').val(show.Total);
					//var total_score = cric_score + foot_score + basket_score + volley_score + khokho_score +kabbaddi_score +tennis_score+tt_score+badminton_score+hockey_score+handball_score+chess_score+carrom_score+athletics_score+throw_score+waterpolo_score+swimming_score;
			
					
				}
			});
	});
$("#textsub").click(function(){

var text = $("#txtmessage").val();
if(text.length>0)
{
$.ajax({
	type :"POST",
	url : "sportsfeteedit.php",
	async:false,
	data :{
			textme:1,
			text:text
	},
	success : function(result)
	{
		alert("INSERTED");
		showmessage();
	}
	});
}
else
{
	alert("ENTER FIELD");

}
});
$('body').delegate('.editm','click',function(){
		var IdEditm = $(this).attr('ide1');
		
		$.ajax({
				url		: "sportsfeteedit.php",
				type 		: "POST",
				datatype 	: "JSON",
				data  		: {
							editvaluem : 1,
							id         : IdEditm
					 	   },
				success : function(show)
				{
					 $('#idmess').val(show. idm);
					$('#txtmessage').val(show.txtmessage);
				}
			});
	});
$('body').delegate('.deletem','click',function(){
		var IdDeletem = $(this).attr('idd1');
		var test= window.confirm("DO YOU WANT TO DELETE THIS RECORD")
		if(test)
		{
		{
			$.ajax({
				url 	: "sportsfeteedit.php",
				type	: "POST",
				async	: false,
				data 	: {
					deletesm : 1,
					id     : IdDeletem
					},
				success:function(){
				alert("Success Delete");
				showmessage();
				}
				});
		}
		}
	});

$('#textup').click(function(){
		var id = $('#idmess').val()-0;
		var text =$('#txtmessage').val();
		$.ajax({
			url : "sportsfeteedit.php",
			type : "POST",
			async: false,
			data :{
				upmess : 1,
				uptextid : id,
				uptext : text
			},
			success:function(up)
				{
					//alert(up);
					alert("success update");
					$('input[type=text]').val('');
					$('#txtmessage').val('');
					showmessage();
				}
		});
	});
	$('#sub').click(function(){
		var Dept = $('#Dept').val();
		var cric_score = $('#cric_score').val();
		var foot_score = $('#foot_score').val();
		var basket_score = $('#basket_score').val();
		var volley_score = $('#volley_score').val();
		var kabbaddi_score = $('#kabbaddi_score').val();
		var tennis_score = $('#tennis_score').val();
		var  tt_score = $('#tt_score').val();
		var badminton_score = $('#badminton_score').val();
		var hockey_score = $('#hockey_score').val();
		var carrom_score = $('#carrom_score').val();
		var chess_score = $('#chess_score').val();
		var handball_score = $('#handball_score').val();
		var  khokho_score = $('#khokho_score').val();
		var athletics_score = $('#athletics_score').val();
		var throw_score = $('#throw_score').val();
		var waterpolo_score = $('#waterpolo_score').val();
		var swimming_score =$('#swimming_score').val();
		var total_score = $('#total_score').val();
	//	var total_score = cric_score + foot_score + basket_score + volley_score + khokho_score +kabbaddi_score +tennis_score+tt_score+badminton_score+hockey_score+handball_score+chess_score+carrom_score+athletics_score+throw_score+waterpolo_score+swimming_score;
	if(Dept.length>0&&cric_score.length>0&&foot_score.length>0&&basket_score.length>0&&volley_score.length>0&&kabbaddi_score.length>0&&tennis_score.length>0&&tt_score.length>0&&badminton_score.length>0&&hockey_score.length>0&&khokho_score.length>0&&athletics_score.length>0&&throw_score.length>0&&waterpolo_score.length>0&&swimming_score.length>0&&total_score.length>0)
	{
		
		$.ajax({
			type:"POST",
			url : "sportsfeteedit.php",
			async: false,
			data :{
				save : 1,
				Dept : Dept,
				chess_score :chess_score,
				carrom_score: carrom_score,
				cric_score:cric_score,
				khokho_score:khokho_score,
				kabbaddi_score:kabbaddi_score,
				hockey_score:hockey_score,
				handball_score:handball_score,
				athletics_score:athletics_score,
				waterpolo_score:waterpolo_score,
				foot_score:foot_score,
				volley_score:volley_score,
				basket_score:basket_score,
				badminton_score:badminton_score,
				throw_score:throw_score,
				tennis_score:tennis_score,
				tt_score:tt_score,
				swimming_score:swimming_score,
				total_score:total_score
			},
			success : function(result)
			{
				alert("INSERTED");
				showmessage();
			}
		});
	}
	else
	{
		alert("ENTER FIELDS");
	}

	});
})
function showdata ()
{
	$.ajax({
		type  : "POST",
		url   : "sportsfeteedit.php",
		async : false,
		data  : { 
				show : 1
			},
		success : function (re)
		{
		$('#showdata').html(re);	
		}
	});
	}
	function showmessage()
	{
		$.ajax({
			type:"POST",
			url:"sportsfeteedit.php",
			async:false,
			data:{
				show1 : 1
			},
			success:function(re)
			{
				$('#showmessage').html(re);
			}
		});
	}
</script>
</head>