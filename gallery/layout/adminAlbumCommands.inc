<!-- Begin adminAlbumCommands -->
<div class="admin"><?php

/* User is allowed to delete the album */
if ($gallery->user->canDeleteAlbum($gallery->album)) {
	echo "\n\t". popup_link("[". _("delete album") ."]", "delete_album.php?set_albumName={$tmpAlbumName}");
}

/* User is allowed to change the album */
if ($gallery->user->canWriteToAlbum($gallery->album)) {
	echo "\n\t". popup_link("[". _("move album") ."]", "move_album.php?set_albumName={$tmpAlbumName}&index=$i&reorder=0");
	echo "\n\t". popup_link("[". _("reorder album") ."]", "move_album.php?set_albumName={$tmpAlbumName}&index=$i&reorder=1");
	echo "\n\t". popup_link("[". _("rename album") ."]", "rename_album.php?set_albumName={$tmpAlbumName}&index=$i");
}

/* User ist allowed to change album captions */
/* Should this be into the above group ? */
if ($gallery->user->canChangeTextOfAlbum($gallery->album) && !$gallery->session->offline) {
	echo "\n\t". '<a href="'. makeGalleryUrl("captionator.php", array("set_albumName" => $tmpAlbumName)) . '">' . 
		'['. _("edit captions") . ']</a>';
}

/* User is Admin or Owner */
if ($gallery->user->isAdmin() || $gallery->user->isOwnerOfAlbum($gallery->album)) {

	/* User is allowed to change Album Permissions */
	echo "\n\t". popup_link("[" . _("permissions") ."]", "album_permissions.php?set_albumName={$tmpAlbumName}");
	echo "\n\t". popup_link("[" . _("properties") ."]", "edit_appearance.php?set_albumName={$tmpAlbumName}", 0, true, 500, 600);

	/* User is allowed to view ALL comments */
	if ($gallery->user->canViewComments($gallery->album)
		&& ($gallery->app->comments_enabled == 'yes')
		&& ($gallery->album->lastCommentDate("no") != -1)) {
	    	echo "\n\t". '<a href="'. makeGalleryUrl("view_comments.php", array("set_albumName" => $tmpAlbumName)) . '">' .
			'[' . _("view&nbsp;comments") . ']</a>';
	}

	/* Watermarking support is enabled and user is allowed to watermark images/albums */
	if (!empty($gallery->app->watermarkDir) && $gallery->album->numPhotos(1)) {
		echo "\n\t". popup_link("[" . _("watermark&nbsp;album") . "]", "watermark_album.php?set_albumName={$tmpAlbumName}");
	}
}
?>

</div>
<!-- End adminAlbumCommands -->
