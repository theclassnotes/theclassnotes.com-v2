
		ns4 = (document.layers)? true:false;
		ie4 = (document.all)? true:false;
		function setAttrib(objName,attribName,value,styleBool) {
			if (ns4) {
				attribName = (attribName=="left") ? "pageX" : attribName;
				eval("document['"+objName+"']."+attribName+"=value");
			} else if (ie4) {
				eval("document.all['"+objName+"']" + (styleBool==1 ? ".style" : "") + "."+attribName+"='"+value+"'");
			} else {		// Netscape 6
				eval("document.getElementById('"+objName+"')" + (styleBool==1 ? ".style" : "") + "."+attribName+"=value");				
			}
		}	

		var currMsg = 0;
		var colorArr = Array("ffffff","cccccc","999999","666666","333333","000000","333333","666666","999999","cccccc","ffffff");
		var currStep = 0;
		function fadeMessages() {
			setAttrib("importantmessage","innerHTML",msgArr[currMsg],0)
			setAttrib("importantmessage","color",("#" + colorArr[currStep]),1)
			if (currStep==0) {
				delayTime = 4000;
			} else {
				delayTime = 40;
				if (currStep==4) {
					currMsg++; if (currMsg>=msgArr.length) currMsg=0;
				}
			}
			currStep++;  if (currStep>10) currStep=0;
			theID = setTimeout("fadeMessages()",delayTime);
		}
