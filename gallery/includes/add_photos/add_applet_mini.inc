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
 * $Id: add_applet_mini.inc,v 1.6 2004/04/16 16:54:52 ckdake Exp $
 */
?>

<p><?php echo _("Use the Gallery Remote Mini Applet to upload pictures. It will take a short while to download.") ?></p>
<p><?php echo _("If you don't have the Java Plugin 1.4 or later, you can use one of the other methods.") ?></p>

<p>

<?php
	drawApplet(
		400,
		300,
		"com.gallery.GalleryRemote.GRAppletMini",
		$gallery->app->photoAlbumURL . "/java/GalleryRemoteAppletMini.jar," . 
			$gallery->app->photoAlbumURL . "/java/GalleryRemoteHTTPClient.jar," . 
			$gallery->app->photoAlbumURL . "/java/applet_img.jar",
		$gallery->album->fields["name"],
		array(),
		array("toSysOut" => "true"),
		dirname(__FILE__) . "/add_applet_mini.cfg",
		_("Your browser doesn't support applets; you should use one of the other upload methods.")
	);
?>

</p>
