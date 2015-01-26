<html>

<head>

<title>SFEED</title>

<style>
@font-face {
    font-family:"high School USA Sans";
    src: url(./HighSchoolUSASans.ttf);
}

body
{
	padding:0;
	margin:0;
	overflow-x:hidden;
}

#container
{
	height:100%;
	width:100%;
	position:relative;
	font-family:"high School USA Sans";
}

#layer1
{
	z-index:10;
	height:100%;
	width:100%;
	position:absolute;
	text-align:center;
	overflow:hidden;
}

#layer2
{
	position:absolute;
	z-index:20;
	height:100%;
	width:100%;
}

#layer3
{
	position:absolute;
	height:100%;
	width:100%;
	z-index:40;
	background-color:rgba(0,0,0,0.95);
	text-align:center;
	opacity:1;
}

#sfeed_ban
{
	font-size:150px;
	font-weight:bold;
	color:#FFF;
}

#nitt_ban
{
	font-size:100px;
	color:#CCC;
}

#prev
{
	background-color:rgba(0,0,0,0.5);
	float:left;
	height:5%;
	width:5%;
	color:#FFF;
	text-align:center;
	font-size:25px;
}

#next
{
	background-color:rgba(0,0,0,0.5);
	float:right;
	color:#FFF;
	height:5%;
	width:5%;
	text-align:center;
	font-size:25px;
}

#sprt_ban
{
	font-size:150px;
	color:rgba(0,0,0,0.7);
	height:25%;
	width:100%;
	float:left;
}

#sport_panel
{
	position:relative;
	height:100%;
	width:100%;
}

#sports_cont_1
{
	height:70%;
	width:100%;
	float:left;
	position:absolute;
	z-index:0;
	margin-top:12%;
	margin-left:7%;
}

#sports_cont_2
{
	height:70%;
	width:100%;
	float:left;
	position:absolute;
	opacity:0;
	z-index:-10;
	margin-top:12%;
	margin-left:7%;
}

.rects
{
	float:left;
	height:100%;
	width:12%;
	background-color:#666;
	background-size:cover;
	display:inline-block;
	margin-left:2%;
	position:relative;
	
}
.transp
{
	height:100%;
	width:100%;
	background-color:#FFF;
	opacity:0.5;
}

#write
{
	visibility:hidden;
	width:100%;
	height:40%;
	background-size:cover;
	z-index:5;
	position:absolute;
}

#write img
{
	height:100%;
	width:100%;
}
	
.rects:hover{
	-webkit-animation:scl 2s ;
	-webkit-animation-fill-mode:forwards;
}

.rects:hover #write{
	visibility:visible;
}

@-webkit-keyframes scl{
	0%   {-webkit-transform:scale(1,1);
	}
	100% {-webkit-transform:scale(1.1,1.1)}
	
}
.rects:hover .transp{
  -webkit-animation:trsp 2s;
  -webkit-animation-iteration-count:1;
  -webkit-animation-fill-mode:forwards;
  
}

@-webkit-keyframes trsp{
	0%  {opacity:0.5;}
  100%  {opacity:0}
}

#capt_ban
{
	color:#090;
	cursor:pointer;
}

#Ldr_click
{
	background-color:#090;
	color:#FFF;
	font-size:30px;
	cursor:pointer;
}

#Ldr_click: hover
{
	background-color:#FFF;
	color:#090;	
}

.ldr_row
{
	width:140%;
	height:30px;
	font-size:17px;
	color:#FFF;
	margin-left:0%;
}

.ldr_col
{
	float:left;
	text-align:center;
	width:4.2%;
	margin-left:1%;
}

#ldrbrd
{
	height:75%;
	width:100%;
	overflow:scroll;
	overflow-y:hidden;
}

#up_bar
{
	color:#FFF;
	text-align:right;
	height:30px;
	width:100%;
}

#up_bar span
{
	margin-right:1%;
}

#sfeed_btn
{
	color:#FC0;
	background-color:#000;
	cursor:pointer;
}

#fete_btn
{
	color:#000;
	background-color:#FC0;
	cursor:pointer;
}


</style>

</head>

<body>

<div id="container">

	<div id="layer1">
    
    	<span id="sprt_ban">SPORTS FEED</span>
        
        <div id="sport_panel">
        
        <div id="sports_cont_1" style="opacity:1">
        
        	<a href="./bavya/football.php?id=2" style="text-decoration:none">
			<div class="rects" style=" background-image:url(Res/fbl2.jpg)">
			<div id="write">
			<img src="Res/fbl_1.jpg"/>
			</div>
			<div class="transp"></div>
			</div>
			</a>
            
            <a href="./badminton/badminton.php?id=4" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/bd1.jpg)">
            <div id="write" >
            <img src="Res/bdm_1.jpg"/></div>
            <div class="transp"></div>
            </div>
            </a>
            
            <a href="./SFEED_Voleyball/index-2.php?id=3" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/vb1.jpg)">
            <div id="write" >
            <img src="Res/vbl_1.jpg"></div>
            <div class="transp"></div>
            </div>
            </a>
            
            <a href="./crik/crik.php?id=9" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/cric1.jpg)">
            <div id="write" >
            <img src="Res/crc_1.jpg">
            </div>
            <div class="transp"></div>
            </div>
        </a>
            
            <a href="./handball/handball.php?id=5" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/hb1.jpg)">
            <div id="write" >
            <img src="Res/hbl_1.jpg">
            </div>
            <div class="transp"></div>
            </div>
            </a>
            
             <a href="./hockey/hockey.php?id=6" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/hk1.jpg)">
            <div id="write" >
            <img src="Res/hk_1.jpg">
            </div>
            <div class="transp"></div>
            </div>
        </a>
            
        </div>
        

        <div id="sports_cont_2" style="opacity:0;">
        	
        	<a href="./basketball/bbhome.php?id=1" style="text-decoration:none">
        	<div class="rects" style="background-image:url(Res/bb1.jpg)">
            <div id="write" >
            <img  src="Res/bbl_1.jpg">
            </div>
            <div class="transp"></div>
            </div>
            </a>

            <a href="./chess/testindex.php?id=8" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/chess-1.jpg)">
            <div id="write" >
            <img  src="Res/che-1.jpg">
            </div>
            <div class="transp"></div>
            </div>
            </a>

            <a href="./swimming/index.php?id=7" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/sw-1.jpg)">
            <div id="write" >
            <img  src="Res/swi-1.jpg">
            </div>
            <div class="transp"></div>
            </div>
        </a>

        <a href="" style="text-decoration:none">
            <div class="rects" style="background-image:url(Res/ncc-1.jpg)">
            <div id="write" >
            <img  src="Res/ncc_w-1.jpg">
            </div>
            <div class="transp"></div>
            </div>
        </a>

        </div>
        
        </div>
    </div>
    
    <div id="layer2">
    	</br></br></br></br></br>
        </br></br></br></br></br>
        </br></br></br></br></br>
	    <div id="prev">
   		 PREV
    	</div>
    
   		<div id="next">
      	 NEXT
    	</div>
    
    </div>
    
    <div id="layer3" style="opacity:1">
    	<span id="nitt_ban" style="opacity:1;">NATIONAL INSTITUTE OF TECHNOLOGY, TRICHY</span></br><span id="sfeed_ban" style="opacity:1;">SFEED</span></br><span id="capt_ban" style="opacity:1;">Click to continue</span></br></br></br></br><span id="Ldr_click" style="opacity:1;">SPORTS FETE'15 LEADERBOARD</span>
    	
        
        
    </div>
    
</div>

</body>

<script>

var xvar;
var vyar;
var chk;
var l3=document.getElementById("layer3");
var l3inner=l3.innerHTML;

//l3 inner
var nitt_ban=document.getElementById("nitt_ban");
var sfeed_ban=document.getElementById("sfeed_ban");
var capt_ban=document.getElementById("capt_ban");
var Ldr_click=document.getElementById("Ldr_click");
var mflag=1;

document.getElementById("Ldr_click").onclick=function()
{
	mflag=0;
	var stp=setInterval(function(){

			if(parseFloat(nitt_ban.style.opacity)-0.03>0)
			{nitt_ban.style.opacity=parseFloat(nitt_ban.style.opacity)-0.03;	
			sfeed_ban.style.opacity=parseFloat(sfeed_ban.style.opacity)-0.03;	
			capt_ban.style.opacity=parseFloat(capt_ban.style.opacity)-0.03;	
			Ldr_click.style.opacity=parseFloat(Ldr_click.style.opacity)-0.03;	
			}
			else
			{
				nitt_ban.style.opacity=0;
				capt_ban.style.opacity=0;
				sfeed_ban.style.opacity=0;
				Ldr_click.style.opacity=0;
				
				document.getElementById("layer3").innerHTML="<div id='up_bar'><span id='sfeed_btn'>SFEED</span><span id='fete_btn'>SPORTS FETE LIVE</span></div></br><span id='Ldr_click' style='opacity:1; font-size:24px; background-color:rgba(0,0,0,0);'>SPORTS FETE'15 LEADERBOARD</span></br></br></br><div id='ldrbrd'><div class='ldr_row' style='opacity:1;background-color:#FC0; color:#000'><div class='ldr_col'>DEPT.</div><div class='ldr_col'>ATHLETICS</div><div class='ldr_col'>BADMINTON</div><div class='ldr_col'>BB</div><div class='ldr_col'>CARROM</div><div class='ldr_col'>CHESS</div><div class='ldr_col'>CRIC</div><div class='ldr_col'>FOOTBALL</div><div class='ldr_col'>HANDBALL</div><div class='ldr_col'>HOCKEY</div><div class='ldr_col'>KABADI</div><div class='ldr_col'>KHO-KHO</div><div class='ldr_col'>SWIMMING</div><div class='ldr_col'>THROWBALL</div><div class='ldr_col'>TENNIS</div><div class='ldr_col'>TT</div><div class='ldr_col'>VOLLEYBALL</div><div class='ldr_col'>WATERPOLO</div><div class='ldr_col'>POINTS</div></div></div></br></br>";
				mflag=1;
				clearInterval(stp);
			}
		
									},1);
};

var ele_name;
//document.body.addEventListener("click",function(e){
//	ele_name=document.elementFromPoint(e.clientX,e.clientY).id;
//});

document.getElementById("layer3").onclick=function(e)
{	
	ele_name=document.elementFromPoint(e.clientX,e.clientY).id;
	if((mflag && (ele_name.localeCompare("sfeed_btn")==0)) || (mflag && (ele_name.localeCompare("capt_ban")==0)))
	{
	var stp=setInterval(function(){

			if(parseFloat(l3.style.opacity)-0.03>0)
			{l3.style.opacity=parseFloat(l3.style.opacity)-0.03;	
			}
			else
			{
				l3.style.opacity=0;
				l3.style.zIndex=10;
				document.getElementById("layer1").style.zIndex=40;
				clearInterval(stp);
			}
		
},1);
	}
};

/*document.addEventListener("mousemove",function(e){
	xvar=e.clientX||e.pageX;
	vyar=e.clientY||e.pageY;
	
	chk = document.elementFromPoint(xvar, vyar);
	
	for(var i=0;i<10;i++)
	{
	    if(document.getElementsByClassName("transp").item(i)==chk)
	    {
	     var par=chk.parentNode;
	    	
	     if((par.children[0]))
	     {
		 var chld=par.children[0];
		 chld.style.visibility="visible";
	     }
		}
		else
	    { 
		 var par=document.getElementsByClassName("transp").item(i).parentNode;
	     par.children[0];
		
	     if((par.children[0].getAttribute('id'))=="write")
	     {
		 var chld=par.children[0];
		 chld.style.visibility="hidden";
	     }
		
			 
		}
	
	
	}
});*/

var ele;
var p1=document.getElementById("sports_cont_1");
var p2=document.getElementById("sports_cont_2");
var next=document.getElementById("next");
var prev=document.getElementById("prev");
document.body.onclick=function(e){
	ele=document.elementFromPoint(e.clientX,e.clientY);
	var xc=e.clientX;
	var yc=e.clientY;
	var stp;
	
	if(xc>next.offsetLeft && xc<(next.clientWidth+next.offsetLeft) && yc>next.offsetTop && yc<(next.clientHeight+next.offsetTop))
	{
		stp=setInterval(function(){

			if(parseFloat(p1.style.opacity)-0.03>0)
			{p1.style.opacity=parseFloat(p1.style.opacity)-0.03;	
			}
			else
			{
				p1.style.opacity=0;
				p1.style.zIndex=-10;
				clearInterval(stp);
				stp=setInterval(function(){

				if(parseFloat(p2.style.opacity)+0.03<1)
				{p2.style.opacity=parseFloat(p2.style.opacity)+0.03;	
				}
				else
				{
					p2.style.zIndex=0;
					p2.style.opacity=1;
					prev.style.backgroundColor="rgba(0,0,0,0.9)";
					next.style.backgroundColor="rgba(0,0,0,0.5)";
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
	}
	
	else if(xc>prev.offsetLeft && xc<(prev.clientWidth+prev.offsetLeft) && yc>prev.offsetTop && yc<(prev.clientHeight+prev.offsetTop))
	{
		clearInterval(stp);
		stp=setInterval(function(){

			if(parseFloat(p2.style.opacity)-0.03>0)
			{p2.style.opacity=parseFloat(p2.style.opacity)-0.03;	
			}
			else
			{
				p2.style.opacity=0;
				p2.style.zIndex=-10;
				clearInterval(stp);
				stp=setInterval(function(){

				if(parseFloat(p1.style.opacity)+0.03<1)
				{p1.style.opacity=parseFloat(p1.style.opacity)+0.03;	
				}
				else
				{
					p1.style.zIndex=0;
					p1.style.opacity=1;
					next.style.backgroundColor="rgba(0,0,0,0.9)";
					prev.style.backgroundColor="rgba(0,0,0,0.5)";
					clearInterval(stp);
				}
		
				},1);
			}
		
		},1);
	}

	
	
};

</script>

</html>