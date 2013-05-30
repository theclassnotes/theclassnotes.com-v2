<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=iso-8859-1" />
<title>example guestbook</title>
<style type="text/css">
<!--
body { background: #000000; font: 11px Verdana, Arial, Helvetica, sans-serif; text-align: center }
h1 { color: #FFFFFF; font-size: 2.5em; margin: 0 0 1em }
#navigate { color: #FFFFFF; width: 420px; text-align: left; margin: 0 auto 8px }
.entry { background: #999999; border: solid 1px black; width: 400px; padding: 10px; margin: 0 auto 15px; text-align: left }
.name { font-weight: bold; float: left }
.info { float: right; margin-bottom: 1em }
.entry p { clear: both; margin-top: 0; margin-bottom: 1em }
.date { font-size: 10px; text-align: right }
label { color: #FFFFFF; float: left; text-align: left; font-weight: bold; width: 70px; margin-left: 60px }
input, textarea { width: 175px; border: solid black 1px; background: #EEEEEE; font: 11px Verdana, Arial, Helvetica, sans-serif }
input.submit { font-weight: bold; width: auto }
#submit { font-weight: bold; margin-left: 130px; text-align: left }
* html #submit { margin-left: 133px }
form { margin-bottom: 1em }
.spacer { clear: both; height: 5px }
a { color: #369; text-decoration: none; font-weight: bold }
a:hover { text-decoration: underline }
-->
</style>
</head>
<body>

<h1>classnotes guestbook</h1>

<div id="navigate">pages: <? include('pagelinks.php') ?></div>

<? include('showbook.php') ?>

<div class="entry">
<form method="post" action="signbook.php">
<div class="spacer"></div>
<label>name:</label><input type="text" name="signername" />
<div class="spacer"></div>
<label>email:</label><input type="text" name="email" />
<div class="spacer"></div>
<label>website:</label><input type="text" name="url" value="http://" />
<div class="spacer"></div>
<label>message:</label><textarea name="message" rows="5" cols="20"></textarea>
<input type="hidden" name="bookurl" value="<?=$_SERVER['PHP_SELF']?>" />
<div class="spacer"></div>
<div id="submit"><input type="submit" name="submit" value="sign it" class="submit" /></div>
</form>
<strong>allowed HTML tags:</strong> &lt;a&gt;&lt;em&gt;&lt;strong&gt;&lt;b&gt;&lt;i&gt;&lt;img&gt;
</div>

</body>
</html>