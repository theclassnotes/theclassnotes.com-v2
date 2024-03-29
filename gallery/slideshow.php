<?php
/*
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2004 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * $Id: slideshow.php,v 1.64 2004/06/16 06:49:49 cryptographite Exp $
 */
?>
<?php
	require(dirname(__FILE__)  . '/init.php');

$cookieName = $gallery->app->sessionVar . "_slideshow_mode";
$modeCookie = isset($HTTP_COOKIE_VARS[$cookieName]) ? $HTTP_COOKIE_VARS[$cookieName] : null;
if (isset($mode)) {
	if ($modeCookie != $mode) {
	    setcookie($cookieName, $mode, time()+60*60*24*365, "/" );
	}
} else {
	if (isset($modeCookie)) {
	    $mode = $modeCookie;
	}
}

// Hack check
if (empty($gallery->session->albumName) &&
	   $gallery->app->gallery_slideshow_type == "off") {
	header("Location: " . makeAlbumHeaderUrl());
	return;
}

$albumName = $gallery->session->albumName;

if (!empty($albumName)) {
	if (!$gallery->user->canReadAlbum($gallery->album)) {
		header("Location: " . makeAlbumHeaderUrl());
		return;
	}

	$album = $gallery->album;

	if (!$album->isLoaded()) {
		header("Location: " . makeAlbumHeaderUrl());
		return;
	}

	if ($album->fields["slideshow_type"] == "off") {
		header("Location: " . makeAlbumHeaderUrl($gallery->session->albumName));
		return;
	}
}

// common initialization
if (empty($albumName)) {
	$album = null;
	$recursive = true;
	$number		= (int)$gallery->app->gallery_slideshow_length;
	$random		= ($gallery->app->gallery_slideshow_type == "random");
	$loop		= ($gallery->app->gallery_slideshow_loop == "yes");
	$borderColor	= $gallery->app->default["bordercolor"];
	$borderwidth	= $gallery->app->default["border"];
} else {
	$recursive	= ($album->fields["slideshow_recursive"] == "yes");
	$loop		= ($album->fields["slideshow_loop"] == "yes");
	$random		= ($album->fields["slideshow_type"] == "random");
	$number		= (int)$album->fields["slideshow_length"];
	$borderColor	= $gallery->album->fields["bordercolor"];
	$borderwidth	= $gallery->album->fields["border"];
	$bgcolor	= $gallery->album->fields['bgcolor'];
}


// in offline mode, only high is available, because it's the only
// one where the photos can be spidered...
if (file_exists(dirname(__FILE__) . "/java/GalleryRemoteAppletMini.jar") &&
	file_exists(dirname(__FILE__) . "/java/GalleryRemoteHTTPClient.jar") &&
	! $gallery->session->offline) {
	$modes["applet"] = _("Fullscreen applet");
}

$modes["high"] = _("Modern browsers");

if (!empty($albumName) && !$gallery->session->offline) {
    $modes["low"] = _("Compatible but limited");
}

if (!isset($mode) || !isset($modes[$mode])) {
	$mode = isset($modes[$gallery->app->slideshowMode]) ? $gallery->app->slideshowMode : "high";
}

include(dirname(__FILE__) . "/includes/slideshow/$mode.inc");

slideshow_initialize();

if (!$GALLERY_EMBEDDED_INSIDE) {
doctype();
?>
<html>
<head>
  <title><?php echo $title; ?></title>
<?php 
	common_header();

// the link colors have to be done here to override the style sheet
if ($albumName) {
	echo "\n". '<style type="text/css">';
	if ($gallery->album->fields["linkcolor"]) {
?>
    A:link, A:visited, A:active
      { color: <?php echo $gallery->album->fields[linkcolor] ?>; }
    A:hover
      { color: #ff6600; }
<?php
       	}
       	if ($gallery->album->fields["bgcolor"]) {
	       	echo "BODY { background-color:".$gallery->album->fields[bgcolor]."; }";
       	}
       	if (isset($gallery->album->fields["background"]) && $gallery->album->fields["background"]) {
	       	echo "BODY { background-image:url(".$gallery->album->fields['background']."); } ";
       	}
       	if ($gallery->album->fields["textcolor"]) {
	       	echo "BODY, TD {color:".$gallery->album->fields[textcolor]."; }";
	       	echo ".head {color:".$gallery->album->fields[textcolor]."; }";
	       	echo ".headbox {background-color:".$gallery->album->fields[bgcolor]."; }";
       	}
	echo "\n</style>\n";
}
?>
</head>

<body dir="<?php echo $gallery->direction ?>">

<?php }

includeHtmlWrap("slideshow.header"); ?>

<script language="JavaScript" SRC="<?php echo $gallery->app->photoAlbumURL ?>/js/client_sniff.js"></script>
<script language="JavaScript">
<?php
if ($mode != 'low') {
?>
// Browser capabilities detection ---
// - assume only IE4+ and NAV6+ can do image resizing, others redirect to low
if ( (is_ie && !is_ie4up) || (is_opera && !is_opera5up) || (is_nav && !is_nav6up)) {
	document.location = "<?php echo makeGalleryUrl('slideshow.php',array('mode' => 'low', "set_albumName" => $gallery->session->albumName)); ?>";
}
<?php
}
?>
</script>

<?php
	slideshow_body();
?>

<?php
$imageDir = $gallery->app->photoAlbumURL."/images";
$pixelImage = "<img src=\"" . getImagePath('pixel_trans.gif') . "\" width=\"1\" height=\"1\" alt=\"\">";

#-- breadcrumb text ---
$breadCount = 0;
$breadtext=array();
if ($albumName) {
if (!$gallery->session->offline
	|| isset($gallery->session->offlineAlbums[$gallery->session->albumName])) {
	$breadtext[$breadCount] = _("Album") .": <a class=\"bread\" href=\"" . makeAlbumUrl($gallery->session->albumName) .
      	"\">" . $gallery->album->fields['title'] . "</a>";
	$breadCount++;
}
$pAlbum = $gallery->album;
do {
  if (!strcmp($pAlbum->fields["returnto"], "no")) {
    break;
  }
  $pAlbumName = $pAlbum->fields['parentAlbumName'];
  if ($pAlbumName && (!$gallery->session->offline
  	|| isset($gallery->session->offlineAlbums[$pAlbumName]))) {
    $pAlbum = new Album();
    $pAlbum->load($pAlbumName);
    $breadtext[$breadCount] = _("Album") .": <a class=\"bread\" href=\"" . makeAlbumUrl($pAlbumName) .
      "\">" . $pAlbum->fields['title'] . "</a>";
  } elseif (!$gallery->session->offline || isset($gallery->session->offlineAlbums["albums.php"])) {
    //-- we're at the top! ---
    $breadtext[$breadCount] = _("Gallery") .": <a class=\"bread\" href=\"" . makeGalleryUrl("albums.php") .
      "\">" . $gallery->app->galleryTitle . "</a>";
  } else {
	  break;
  }
  $breadCount++;
} while ($pAlbumName);

//-- we built the array backwards, so reverse it now ---
for ($i = count($breadtext) - 1; $i >= 0; $i--) {
    $breadcrumb["text"][] = $breadtext[$i];
}
} else {
	if (!$gallery->session->offline || isset($gallery->session->offlineAlbums["albums.php"])) {
		//-- we're at the top! ---
		$breadcrumb["text"][$breadCount] = _("Gallery") .": <a class=\"bread\" href=\"" . makeGalleryUrl("albums.php") .
			"\">" . $gallery->app->galleryTitle . "</a>";
		$breadCount++;
	}
}

$breadcrumb["bordercolor"] = $borderColor;
$breadcrumb["top"] = true;

$adminbox["commands"] = "<span class=\"admin\">";

// todo: on the client, prevent old browsers from using High, and remove High from the bar
if ( !$gallery->session->offline) {
	foreach ($modes as $m => $mt) {
		$url=makeGalleryUrl('slideshow.php',array('mode' => $m, "set_albumName" => $gallery->session->albumName));
		if ($m != $mode) {
			$adminbox["commands"] .= "&nbsp;<a class=\"admin\" href=\"$url\">[" .$modes[$m] ."]</a>";
		} else {
			$adminbox["commands"] .= "&nbsp;" .$modes[$m];
		}
	}
}

$adminbox["commands"] .= "</span>";
$adminbox["text"] = _("Slide Show");
$adminbox["bordercolor"] = $borderColor;
$adminbox["top"] = true;
includeLayout('navtablebegin.inc');
includeLayout('adminbox.inc');
includeLayout('navtablemiddle.inc');
includeLayout('breadcrumb.inc');
includeLayout('navtablemiddle.inc');

?>

<?php
	slideshow_controlPanel();
?>

<?php
    includeLayout('navtableend.inc');
?>

<br>

<?php
slideshow_image();
?>

<?php
includeLayout('ml_pulldown.inc');
includeHtmlWrap("slideshow.footer"); ?>

<?php if (!$GALLERY_EMBEDDED_INSIDE) { ?>
</body>
</html>
<?php } ?>
