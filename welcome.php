<html>
<head>
	<title>The Class Notes</title>
	<!-- Welcome -->
	<style type="text/css">
		td {font-family:Arial; font-size:.7em;}
		a:hover {color:#FFE566}
		.big {font-size:1em;}
	</style>
	
<script language="Javascript">
<!--
// Add messages here to have them animated
		var msgArr = Array("<center>Cornell University&rsquo;s <br>Original Coed A Cappella Group<br>&nbsp;<center>",
			"<center>Fall <font color=#FFE566>Auditions</font> coming up! <br>Check-in later for more details!<br>&nbsp;</center>",	
			"<center>Check out sound clips from our latest CD<br><font color=#FFE566>Unfolded</font> in the Recordings section<br>&nbsp;</center>"),
		ns4 = (document.layers)? true:false;
		ie4 = (document.all)? true:false;
		function setAttrib(objName,attribName,value,styleBool) {
			if (ns4) {
				attribName = (attribName=="left") ? "pageX" : attribName;
				eval("document['"+objName+"']."+attribName+"=value");
			} else if (ie4) {
				eval("document.all['"+objName+"']" + (styleBool==1 ? ".style" : "") + "."+attribName+"='"+value+"'");
			} else {		// Netscape 6
				eval("document.getElementById('"+objName+"')" + (styleBool==1 ? ".style" : "") + "."+attribName+"=value");				
			}
		}	
		var currMsg = 0;
		var colorArr = Array("ffffff","cccccc","999999","666666","333333","000000","333333","666666","999999","cccccc","ffffff");
		var currStep = 0;
		function fadeMessages() {
			setAttrib("importantmessage","innerHTML",msgArr[currMsg],0)
			setAttrib("importantmessage","color",("#" + colorArr[currStep]),1)
			if (currStep==0) {
				delayTime = 4000;
			} else {
				delayTime = 40;
				if (currStep==4) {
					currMsg++; if (currMsg>=msgArr.length) currMsg=0;
				}
			}
			currStep++;  if (currStep>10) currStep=0;
			theID = setTimeout("fadeMessages()",delayTime);
		}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body bgcolor=#000000 text=#ffffff link=#cce5ff alink=#ffffff vlink=#cce5ff marginheight=18 marginwidth=10 leftmargin=10 topmargin=18 bottommargin=18 rightmargin=10 bgproperties="fixed" style="background-image:url('img/rightBk.jpg'); background-repeat:no-repeat;" onload="fadeMessages(); parent.nav.clr(0);MM_preloadImages('img/Group.jpg','members/Fall-2005%20Group%201b.gif','img/Group-Fall-%2706.gif')">
<script language="Javascript">var ns4 = (document.layers)? true:false; if (ns4) { document.write("<style tyle='text/css'>.big {font-size:.8em}</style>"); }</script>
<table border=0 cellpadding=0 cellspacing=0>
<tr valign=top>
    <td> <p align="center"><a href="members.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','members/Fall-2005%20Group%201b.gif',1)">    </a></p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center"><a href="members.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Group','','img/Group-Fall-%2706.gif',1)"><img src="img/Group-Fall-%2706b.gif" alt="Members" name="Group" width="480" height="314" border="0"></a></p>      <p align="center">        <br>
        <br>
        <a href="members.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','members/Fall-2005%20Group%201b.gif',1)">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="175" height="54">
          <param name="movie" value="home_text.swf">
          <param name="quality" value="high">
          <embed src="home_text.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="175" height="54"></embed>
        </object>
        </a><img src="img/p.gif" width="1" height="9" border="0">          <b><i><a href="concerts.html" style="text-decoration:none; color:#ffffff;">
        </a></i></b></p>
      <p align="center"><img src="img/la.gif" width="54" height="53" alt="La" border="0" hspace=141 vspace=20> 
        <br>      
        <br>
        visitor number:<br>
      </p>      <center>
        <?php include("count.php")?><br></center></td>
<td width=35><img src="img/p.gif" width="35" height="1" border="0"></td>
    <td width=185> <p> <b class=big><span style=""><a href="contactus.html" style="text-decoration:none; color:#ffffff;">NEWS</a></span></b><br>
        <br>
        <b class=big>04.06.07 // <a href="#">SPRING CONCERT!!! </a></b><br>
        <br>
        <strong>The Class Notes Present <br> 
Cuttin' Class XXIII
<br>
Friday, April 6, 2007 <br>
7PM @ Statler Auditorium<br>
Tix $5WSH / $7 Door </strong><br>
<br>
<a href="picsandmedia/CCXXIII%20Poster.jpg" target="_top"><img src="picsandmedia/CCXXIII-Poster-thumb.jpg" width="100" height="135" border="0"></a><br>
        <br>
        <br>

        <b class=big>2.12.07 //<a href="members.html"> NEWBIES!!</a></b> <br>
Congratulations to the newest members of The Class Notes!</p>    
      <p> <strong>Eugene Chang</strong> <strong>('09)<br>
      </strong><strong>Alex Woogmaster ('10)</strong>, 
        <br>
        <br>
        <strong>        </strong><br>
        <b class=big>
	    </b><b class=big>
  5.12.06 // <a href="auditions.html">Cuttin' Class XXII </a></b><br>
  Thank you to all our fans who helped make Cuttin' Class 22 a success! Check out some live tracks of the concert <a href="picsmedia.html">here</a>! <br>
        <br>
        <a target="_top" href="picsandmedia/Cuttin%27-Class-XXII.jpg"><img src="picsandmedia/Cuttin%27-Class-XXII-thumb.jpg" alt="Cuttin' Class XXII" width="100" height="135" border="0"></a>        <br>
        <br>
        <br>
        <b class=big>2.17.06 // <a href="auditions.html">Newbie!</a></b><br>
        Congratulations to our awesome newbie for the Spring: Andrew Majak. Welcome to the family! <br>
	    <br>
	    <b class=big><br>
        12.15.05 // <a href="picsmedia.html">Goodies!</a></b><br>
        Hey kids, we now have some new live tracks available from our fall show! Check out our <a href="picsmedia.html">media </a>section!<b class=big><br>
        <br>
        <br>
        11.28.05 // <a href="http://www.voicesonlyacappella.com/" target="_blank">Voices Only 2005 </a></b><br>
        The track &quot;Silence&quot; from our latest CD Unfolded is  now featured on a  &quot;Best of&quot; compilation album called &quot;Voices Only.&quot; Check it out <a href="http://www.voicesonlyacappella.com/" target="_blank">here</a>!<b class=big><br>
        <br>
        <br>
        </b>
  
        <b class=big>
        </b>
            <b class=big>10.07.04 // <a href="unfolded.html">Unfolded</a></b><br>
        Our latest CD, Unfolded, has been reviewed!<br>
        <br>
        <a target="_top" href="http://www.rarb.org/reviews/473.html"><IMG
src="img/cdsmallUnfolded.gif" width="79" height="88" border=0></a><br>
        <br>
        Click to read the <a target="_top" href= "http://www.rarb.org/reviews/473.html">review</a>.<br>
        <br>
        <br>
        <b class=big><a href="contactus.html" style="text-decoration:none; color:#ffffff;">HIRING 
        *</a></b><br>
        Need some high class<br>
        entertainment? <a href="contactus.html">Contact us</a><br>
        for your next event.
        <!-- <p><br><p><br><p>
<img src="/cgi-sys/Count.cgi?df=theclassnotes.com-welcome.html&dd=C&ft=0" align="right"> -->
    </p>    </td>
  </tr>
<tr valign=top>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</body>
</html>