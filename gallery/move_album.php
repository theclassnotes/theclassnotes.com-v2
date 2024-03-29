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
 * $Id: move_album.php,v 1.47 2004/05/28 17:13:43 cryptographite Exp $
 */
?>
<?php

require(dirname(__FILE__) . '/init.php');

// Hack check
if (!$gallery->user->canWriteToAlbum($gallery->album)) {
	echo _("You are no allowed to perform this action !");
	exit;
}

if (!isset($reorder)) {
	$reorder = 0;
}

doctype();
?>
<html>
<head>
  <title><?php echo _("Move Album") ?></title>
  <?php common_header(); ?>
</head>
<body dir="<?php echo $gallery->direction ?>">

<?php
/* Read the album list */
$albumDB = new AlbumDB(FALSE);

if ($gallery->session->albumName && isset($index)) {

	if (isset($newAlbum)) { // moving album to a nested location
		if ($gallery->album->fields['name'] != $newAlbum) {
			$old_parent=$gallery->album->fields['parentAlbumName'];
			$gallery->album->fields['parentAlbumName'] = $newAlbum;
			// Regenerate highlight if needed..
			if ($gallery->app->highlight_size != $newAlbum->fields["thumb_size"]) {
				$hIndex = $gallery->album->getHighlight();
				if (isset($hIndex)) {
					$hPhoto =& $gallery->album->getPhoto($hIndex);
					$hPhoto->setHighlight($gallery->album->getAlbumDir(), true, $gallery->album);
				}
			}
			if ($old_parent== 0) {
				$old_parent=".root";
			}
			$gallery->album->save(array(i18n("Album moved from %s to %s"),
						$old_parent,
						$newAlbum));
			$newAlbum = $albumDB->getAlbumByName($newAlbum);
			$newAlbum->addNestedAlbum($gallery->album->fields['name']);
			if ($newAlbum->numPhotos(1) == 1) {
				$newAlbum->setHighlight(1);
			}
			$newAlbum->save(array(i18n("New subalbum %s, moved from %s"),
						$gallery->album->fields['name'], 
						$old_parent));
		}
		dismissAndReload();
		return;
	}
	if (isset($newIndex)) {
		$albumDB->moveAlbum($gallery->user, $index, $newIndex);
		$albumDB->save();
		dismissAndReload();
		return;
	} else {
		$numAlbums = $albumDB->numAlbums($gallery->user);
?>

<center>
<p class="popuphead"><?php echo _("Move Album") ?></p>

<div class="popup">
<?php echo _("Select the new location of album") ?> <?php echo $gallery->album->fields["title"] ?>:

<?php
   
echo '<p>' .  $gallery->album->getHighlightTag() . '</p>';

if ($reorder) { // Reorder, intra-album move
	echo makeFormIntro("move_album.php", array("name" => "theform")); 
?>
<input type="hidden" name="index" value="<?php echo $index ?>">
<select name="newIndex">
<?php
for ($i = 1; $i <= $numAlbums; $i++) {
	$sel = "";
	if ($i == $index) {
		$sel = "selected";
	} 
	echo "<option value=\"$i\" $sel> $i</option>";
}
?>
</select>
<input type="submit" name="move" value="<?php echo _("Move it!") ?>">
<input type="button" name="cancel" value="<?php echo _("Cancel") ?>" onclick='parent.close()'>
</form>

<p>
<?php
}
if (!$reorder) { // Reorder, trans-album move
	echo _("Nest within another Album:") 
?>

<?php echo makeFormIntro("move_album.php", array("name" => "move_to_album_form")); ?>
<input type="hidden" name="index" value="<?php echo $index ?>">
<select name="newAlbum">
<?php
printAlbumOptionList(0,1)  
?>
</select>
<br><br>

<input type="submit" name="move" value="<?php echo _("Move to Album!") ?>">
<input type="button" name="cancel" value="<?php echo _("Cancel") ?>" onclick='parent.close()'>
</form>
<?php
} // End Reorder
echo "</div>";
echo "</center>";
	}
} else {
	echo gallery_error(_("no album / index specified"));
}
?>

<script language="javascript1.2" type="text/JavaScript">
<!--   
// position cursor in top form field
document.theform.newIndex.focus();
//-->
</script>


<?php print gallery_validation_link("move_album.php", true, array('index' => $index)); ?>
</body>
</html>
