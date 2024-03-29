#!/bin/bash
# $Id: edit_changelog.sh,v 1.3.2.1 2004/07/15 21:52:24 jenst Exp $

esc=`echo -en "\033"`
tab="${esc}[5G"
clear

if [ -z $1 ] ; then
	echo -e "\nusage :"
	echo "sh update_po_files.sh -all for all .po file"
	echo -e "or sh update_po_files.sh -po <language_COUNTRY> for only one. e.g. sh update_po_files.sh -po de_DE \n" 
	exit
fi

if [ $1 != "-all" ] && [ ! -e ../locale/$2 ]; then
	echo -e "\n$2 does not exist or your paramater was wrong"
	echo -e "\nusage :"
	echo -e "sh update_po_files.sh -po <language_COUNTRY> for only one. e.g. sh update_po_files.sh -po de_DE \n" 
	exit
fi

ACTUALPATH=${0%/*}
cd $ACTUALPATH

#find all .po files or use only one

echo -n "checking for Changelog files ...."
find ../locale/ -iname "??_??*Changelog" >/dev/null 2>/dev/null || {
	echo $rc_failed	
	echo "$tab No valid Changelog files found"
	exit 0
}

if [ $1 = "-all" ] ; then
	Cfiles=$(find ../locale/ -iname "??_??*Changelog")
else
	Cfiles=$(find ../locale/$2 -iname "??_??*Changelog")
fi

for all_CF in $Cfiles ; do
	echo -e "\nFound : $all_CF"
		
	lang1=${all_CF%-*}
	lang=${lang1##*/}

	echo "$tab Language = $lang"

	echo "$tab Updating ..."
	echo "" >> $all_CF
	echo "===============================================================================" >> $all_CF
	echo "2004-07-15 Jens Tkotz <jens@peino.de> 1.4.4-RC2" >> $all_CF
	echo "===============================================================================" >> $all_CF
#	echo "" >> $all_CF
#	echo " * Switch to ngettext !" >> $all_CF
#	echo " * PLURAL DEFINTION MISSING !" >> $all_CF
#	echo "" >> $all_CF
#	echo "===============================================================================" >> $all_CF
#	echo "" >> $all_CF
#read trash
done

find ../locale/ -iname "*~" -exec rm {} \;