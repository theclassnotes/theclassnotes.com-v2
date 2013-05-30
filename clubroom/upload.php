<? require("enter.php"); ?>
<html>
<body>

<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
 <table width=80% align=center border=0 class="body">
<form enctype="multipart/form-data" method="post">
<tr>
<td align="right">
  <B>File</B>: </td><td width=60%><input name="userfile" type="file">
  </td>
</tr>
<tr>
<td align="right">
<B>Name</B>:</td><td width=60%><input type="text" name="Name" maxlength=30 size=30>
</td>
</tr>
<tr>
<tr>
<td align="right">
<B>Artist</B>:</td><td width=60%><input type="text" name="Artist" maxlength=30 size=30>
</td>
</tr>
<tr>
<td  align="right">
<B>Arranger</B> (lastname, firstname):</td><td width=60%><input type="text" name="Arranger" maxlength=30 size=30>
</td>
</tr>
<tr>
<td align="right">
<B>Semester</B>:</td><td width=60%>
<select name="Semester" class="body">
<option selected value="">Select a Semester</option>
<option value="Fall">Fall</option>
<option value="Spring">Spring</option>
</select>
</td>
</tr>
<tr>
<td align="right">
<B>Year</B> (4 digits):</td><td width=60%><input type="text" name="Year" maxlength=4 size=4>
</td>
</tr>
<tr>
<td align="right">
<B>File Type</B>:</td><td width=60%>
<select name="Type" class="body">
<option selected value="">Select a File Type</option>
<option value="Sib2">Sib2</option>
<option value="Sib">Sib</option>
<option value="Finale">Finale</option>
<option value="PDF">PDF</option>
</select>
</td>
</tr>
<tr>
<td align="right">
<B>Comments</B></td><td width=60%><input type="text" name="Comments" size=30 maxlength=255>
</td>
</tr>
<tr>
  <td align="right">
  <input type="submit" value="Upload" name="submit"><td width=60%>Script written by Gei-Tai Lin</td></tr>
</form></table>

<?
if ($submit)
{
    $uploaddir = 'arrangements/';
    list($lastname, $firstname) = split('[,]', $Arranger);
    if (strcmp($Type,"Finale")==0)
      $ft = ".MUS";
    else if (strcmp($Type,"Sib2")==0 || strcmp($Type,"Sib")==0)
      $ft = ".sib";
    else if (strcmp($Type,"PDF")==0)
      $ft = ".pdf";
    $fn = $Name . "_" . $lastname . "_" . $Semester . $Year . $ft;
    $uploadfile = $uploaddir . $fn;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
    $Score = $_FILES['userfile']['name'];
    $add = "REPLACE INTO arrangements(Name,Artist,Arranger,Semester,Year,Score,Type,Comments) VALUES ('$Name','$Artist','$Arranger','$Semester','$Year','$fn','$Type','$Comments')";
    mysql_query($add);
    mysql_close();
}
?>
</body>
</html>