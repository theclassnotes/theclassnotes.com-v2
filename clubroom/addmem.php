<? require("enter.php"); ?>
<html>
<body>

<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
 <table width=80% align=center border=0 class="body">
<form enctype="multipart/form-data" method="post">
<tr>
<td  align="right">
<B>First Name</B> :</td><td width=60%><input type="text" name="FirstName" maxlength=30 size=30>
</td>
</tr>
<tr>
<td  align="right">
<B>Last Name</B> :</td><td width=60%><input type="text" name="LastName" maxlength=30 size=30>
</td>
</tr>
<tr>
<td  align="right">
<B>Birthday</B> (MM/DD/YY):</td><td width=60%><input type="text" name="Birthday" maxlength=8 size=8>
</td>
</tr>
<tr>
<td align="right">
<B>E-mail</B>:</td><td width=60%><input type="text" name="Email" maxlength=30 size=30>
</td>
</tr>
<tr>
<tr>
<td align="right">
<B>Cell Phone</B> (xxx-xxx-xxxx):</td><td width=60%><input type="text" name="Cell" maxlength=12 size=12>
</td>
</tr>
<tr>
<td align="right">
<B>Other Phone</B> (xxx-xxx-xxxx):</td><td width=60%><input type="text" name="Other" maxlength=12 size=12>
</td>
</tr>
<tr>
<td align="right">
<B>Address</B> (## Dorm/## St):</td><td width=60%><input type="text" name="Address" maxlength=80 size=50></textarea>
</td>
</tr>
<tr>
<td align="right">
<B>Home Phone</B> (xxx-xxx-xxxx):</td><td width=60%><input type="text" name="HomePhone" maxlength=12 size=12>
</td>
</tr>
<tr>
<td align="right">
<B>Home Address</B>:</td><td width=60%><textarea name="HomeAdd" rows=3 cols=30></textarea>
</td>
</tr>
<tr>
<td align="right">
<B>AIM</B>:</td><td width=60%><input type="text" name="AIM" maxlength=30 size=30>
</td>
</tr>
<tr>
<td align="right">
<B>Position</B></td><td width=60%><input type="text" name="Position" size=30 maxlength=255>
</td>
</tr>
<tr>
<td width=100% align="right">
  <input type="submit" value="Upload" name="submit">
<td>
</tr>
</form></table>

<?
if ($submit)
{
    $add = "REPLACE INTO members(FirstName,LastName,Birthday,Email,Cell,Other,Address,HomePhone,HomeAdd,AIM,Position) VALUES ('$FirstName','$LastName','$Birthday','$Email','$Cell','$Other','$Address','$HomePhone','$HomeAdd','$AIM','$Position')";
    mysql_query($add);
    mysql_close();
}
?>
</body>
</html>