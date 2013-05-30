<? require("enter.php"); ?>
<html>
<body>

<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
 <table width=80% align=center border=0 class="body">
<form enctype="multipart/form-data" method="post">
<tr>
<td align="right">
<B>Date</B>:</td><td width=60%><input type="text" name="Date" maxlength=10 size=10>
</td>
</tr>
<tr>
<td align="right">
<B>Heading</B>:</td><td width=60%><input type="text" name="Heading" maxlength=30 size=30>
</td>
</tr>
<tr>
<td  align="right">
<B>Link</B>:</td><td width=60%><input type="text" name="Link" maxlength=50 size=50>
</td>
</tr>
<tr>
<td align="right">
<B>Caption</B>:</td><td width=60%><input type="blob" name="Caption" maxlength=50 size=50>
</td>
</tr>
<tr>
  <td align="right">
  <input type="submit" value="Upload" name="submit"><td width=60%>Script written by Gei-Tai Lin</td></tr>
</form></table>

<?
if ($submit)
{
    $add = "REPLACE INTO news(Date,Link,Heading,Caption) VALUES ('$Date','$Link','$Heading','$Caption')";
    mysql_query($add);
    mysql_close();
}
?>
</body>
</html>