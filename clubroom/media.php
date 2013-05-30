<html>

<head>

<title>members admin</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta name="description" content="">

<meta name="keywords" content=""> 

<meta name="author" content="">


<STYLE>
<!--

a:default {color: white; text-decoration: none}

a:link {color: blue; text-decoration: none}

a:visited {color: blue; text-decoration: none}

a:hover {color: green; border: dashed; border-width: 0 0 1 0}


p {line-height: 12pt;}

body {font-family: "Arial"; font-size: 10pt}

hr {width: 75%; color: #666666; height: 1}

table {font-size: 10pt; border-collapse: collapse;}



.masthead {width: 100%; border: none; padding: 0px;}
  
.links {width: 100%; border: none; padding: 0px;}

    .masthead img {width: 640px; height: 100px; border: none}

    .links img {width: 318px; height: 25px; border: none}


.section {margin: 40 0 0 0}

.cap {font-size: 7pt;}

.option {color: red; font-size: 7pt}

.irow0 {height: 16pt; background: #333333; color: #FFFFFF; font-weight: bold; border: solid; border-width: 0 0 1 0; line-height: 1}

.irow1 {height: 16pt; background: #FFFFFF}

.irow2 {height: 16pt; background: #FFFFFF}

.icol {}

.inam {font-weight: bold}

.memberinfo {font-size: 9pt;}

.arrangements {font-size: 8 pt}

.arow0 {height: 16pt; background: #333333; color: #FFFFFF; font-weight: bold; border: solid; border-width: 0 0 1 0}

.arow1 {height: 16pt; background: #FFFFFF}

.arow2 {height: 16pt; background: #FFFFFF}

.acol {}

.anam {font-weight: bold}

.instruct {color: white}

.highlight {background: yellow}


.footer {background: #2E2E2E; color: #FFFFFF; text-align: right; width: 100%; font-weight: bold; font-size: 9pt}


-->
</STYLE>


<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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

<?
require("enter.php");
?>

<body bgcolor="#000000" alink=#ffffff onLoad="MM_preloadImages('images/Directory2.jpg','images/Arrangements2.jpg')">


<table border=0>
  <tr>
    <td> 
      <!-- ######################################## MASTHEAD ######################################## -->
      <!-- ######################################## INTRODUCTION ######################################## -->
      <p align="left">&nbsp;
      <table width="166" border="0">
        <tr>
          <td><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Home','','images/clubroom%20header%20home.jpg',1)"><img src="images/clubroom%20header.jpg" name="Home" width="800" height="150" border="0"></a></td>
        </tr>
      </table>
      <table width="805" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td width="200"><div align="center"><a href="media.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Arrangements','','images/Arrangements2.jpg',1)"><img src="images/Arrangements1.jpg" name="Arrangements" width="150" height="30" border="0"></a></div></td>
          <td width="100"><div align="center"><a href="directory.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/Directory2.jpg',1)"><img src="images/Directory1.jpg" name="Image3" width="150" height="30" border="0"></a></div></td>
          <td width="200">&nbsp;</td>
          <td width="200">&nbsp;</td>
        </tr>
      </table>
      <p><img src="images/Heading_arrangements.jpg" width="395" height="60"> 
      <p>&nbsp;
<!-- ######################################## ARRANGEMENTS ######################################## -->
<?
require("enter.php");
?>

<table class=arrangements width=760>

  <tr class=arow0>
    <td width=180><a href="media.php?sort=Name&type=asc">Name</a></td>
  
    <td><a href="media.php?sort=Artist&type=asc">Artist</a></td>

    <td><a href="media.php?sort=Arranger&type=asc">Arranger</td>

    <td>Score</td>

    <td>Type</td>

    <td><a href="media.php?sort=Semester&type=asc">Semester</td>

    <td><a href="media.php?sort=Year&type=desc">Year</td>

    <td>Comments</td>
	
	<td>Options</td></tr>


<?
$query = "SELECT * FROM arrangements ORDER BY $sort $type";
$result = MYSQL_QUERY($query);
$total_rows = mysql_num_rows($result);

for ($i = 0; $i < $total_rows; $i++) {
$row = mysql_fetch_assoc($result);
?>


  <tr class=arow1>
    <td class=anam><? echo $row["Name"] ?></td>
  
    <td><? echo $row["Artist"] ?></td>

    <td><? echo $row["Arranger"] ?></td>

    <td><a href="/clubroom/arrangements/<? echo $row["Score"] ?>">Score</a></td>

    <td><? echo $row["Type"] ?></td>

    <td><? echo $row["Semester"] ?></td>

    <td><? echo $row["Year"] ?></td>

    <td><? echo $row["Comments"] ?></td>
	
	<td><span class="option"><a href="/clubroom/edit.php?arr=<? echo $row["Name"] ?>">[edit]</a></span></td>
	</tr>

<?
}
mysql_free_result($result);
mysql_close();
?>


    </td>
  </tr>
</table>

	<span class="cap">Sort files by clicking on column headings; RIGHT-click <b>Score</b> to download</span><br><br>

 	<a href="upload.php" onclick="window.open('upload.php','popup','width=500,height=400,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=150,top=100'); return false">Upload an Arrangement</a><br>
	<span class="instruct">
	- Click here to upload your arrangements to the database.<br>
	- Be <b>very precise</b> in entering information into the upload section: identify the appropriate artist and exact song name; capitalize where 
	appropriate, etc. For arrangements with multiple arrangers, separate last names by dashes (-) and don't worry about first names.<br>
	- If you have a <b>WIP</b> (Work-In-Progress), make note of it in the <i>Comments</i> field with "WIP v#" (where # is the version number).<br>
	- When you want to update an old version, simply enter all the information about the file (Name, Artist, Arranger...) <b>exactly</b> as it 
	is for the file you want to update (and leave out comments if it is finalized) and you will replace the old file.<br>
	<br></span>
    </td>
  </tr>

</table>

<a href="index.html"><- Back</a>

</body>

</html>