<? require("enter.php"); ?>
<html>
<STYLE>
<!--
a:link {color: blue; text-decoration: none}

a:visited {color: blue; text-decoration: none}

a:hover {border-left:0px dashed; border-right:0px dashed; border-top:0px dashed; border-bottom:1px dashed; color: green; }


p	{line-height: 12pt;}

body	{font-family: "Arial"; font-size: 10pt}

hr	{width: 75%; color: #666666; height: 1}

table	{font-size: 10pt; border-collapse: collapse;}

.cap {font-size: 7pt}

-->
</STYLE>

<body>

<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
 <table width=80% align=center border=0 class="body">
<form enctype="multipart/form-data" method="post">
<tr>
<td align="right">
<B>Name</B>:</td><td width=60%><input type="text" name="Name" maxlength=80 size=50>
</td>
</tr>
<tr>
<td align="right">
<B>E-mail</B>:</td><td width=60%><input type="text" name="E-mail" maxlength=80 size=30>
</td>
</tr>
<tr>
<td  align="right">
<B>Cell Phone</B>:</td><td width=60%><input type="text" name="Cell" maxlength=12 size=12>
</td>
</tr>
<tr>
<td align="right">
<B>Other Phone</B>:</td><td width=60%><input type="text" name="Other" maxlength=12 size=12>
</td>
</tr>
<tr>
<td align="right">
<B>Address</B>:</td><td width=60%><input type="text" name="Address" maxlength=120 size=50>
</td>
</tr>
<tr>
<td align="right">
<B>AIM</B>:</td><td width=60%><input type="text" name="AIM" maxlength=80 size=50>
</td>
</tr>
<tr>
<td align="right">
<B>Position</B>:</td><td width=60%><input type="text" name="Position" maxlength=80 size=50>
</td>
</tr>
<tr>
  <td align="right">
  <input type="submit" value="Upload" name="submit"><td width=60% class=cap>Script written by Gei-Tai Lin</td></tr>
</form></table>

<?
if ($submit)
{
    $add = "INSERT INTO members(Name,E-mail,Cell,Other,Address,AIM,Position) VALUES ('$Name','$E-mail','$Cell','$Other','$Address','$AIM','$Position')";
    mysql_query($add);
    mysql_close();
}
?>
</body>
</html>