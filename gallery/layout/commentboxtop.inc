<?php /* $Id: commentboxtop.inc,v 1.18.2.1 2004/07/27 08:08:15 cryptographite Exp $ */ ?>
<?php global $commentbox, $embeddedAlbum, $myAlbumName, $myHighlightTag, $myAlbum, $id, $i; ?>
<table width="100%" border="0" cellspacing="0" cellpadding=0>
<tr>
<td colspan="2"><img src="<?php echo getImagePath('pixel_trans.gif') ?>" width="1" height="1" alt=""></td>
<td colspan="2"><img src="<?php echo getImagePath('pixel_trans.gif') ?>" width="1" height="1" alt=""></td>
</tr>
<tr>
<?php if ($embeddedAlbum == 1)
{
    ?>
    <td width="150" valign="top" ><a href="<?php echo makeAlbumUrl($myAlbumName) ?>"><?php echo $myHighlightTag ?></a></td>
    <td width="20">&nbsp;</td>
    <td valign="top">
    <table width="100%" height=95% border="0" cellspacing="0" cellpadding=0 valign="top">
    <tr>
    <td valign="top" width="3000"><span class="title"><?php echo _("Album") ?>: <?php echo $myAlbum->fields["title"] ?></span>
    <?php if ($gallery->album->isHidden($i)) 
    {
        echo "  (". _("hidden") .")";
    } ?>
    <?php if ((!$gallery->album->isHidden($i) || $gallery->user->isAdmin() ||
                        $gallery->user->isOwnerOfAlbum($gallery->album) || $gallery->user->isOwnerOfAlbum($myAlbum))) { ?>
      <span class="admin">
       <?php if ($myAlbum->lastCommentDate("no") != -1) { ?>
       <br><a href="<?php echo makeGalleryUrl("view_comments.php", array("set_albumName" => $myAlbumName)) ?>">[<?php echo _("view comments for this nested album") ?>]</a>
       <?php } else {
       print "<br>"._("Album contains no comments")."\n";
       } ?>
      </span>
    <?php } ?>

    </td>
    </tr>
    </table>
    </td>
    <?php
}
else
{
?>
<td width="150" valign="top" ><a href="<?php echo makeAlbumUrl($gallery->session->albumName, $id) ?>"><?php echo $gallery->album->getThumbnailTag($i) ?></a></td>
<td width="20">&nbsp;</td>
<td valign="top">
<?php if ($gallery->album->isHidden($i)) 
{
	echo "  (". _("hidden") .")";
} ?>
<table width="100%" border="0" cellspacing="0" cellpadding=0>
<tr>
<td colspan="2"><img src="<?php echo getImagePath('pixel_trans.gif') ?>" width="1" height="1" alt=""></td>
<td colspan="2"><img src="<?php echo getImagePath('pixel_trans.gif') ?>" width="1" height="1" alt=""></td>
</tr>
<tr>
<td>
<?php } ?>
