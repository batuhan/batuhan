jQuery(function()
{
	
	var version		= parseInt(jQuery.browser.version);
	var baseurl		= "";
	var imgfolder	= "images/ie-check";
	var msg			= "<div id='ieCheck'>";

	msg				+= "<h2>Browser Error</h2><span class='error-msg'><p>You are currently browsing this site with an unsupported browser. The appearance and features of this site may not work correctly with your current setup. For optimal viewing, please download an updated version of a supported browser by clicking the links below.</p></span>";
	msg				+= "<span class='browser-icons'>";
	msg	 			+= "<a href ='http://getfirefox.com' title='Firefox'><img src='" + baseurl + imgfolder + "/firefox.gif' alt='Firefox'/></a>";
	msg 			+= "<a href ='http://www.opera.com/download/' title='Opera'><img src='" + baseurl + imgfolder + "/opera.gif' alt='Opera'/></a>";
	msg 			+= "<a href ='http://www.apple.com/safari/' title='Safari'><img src='" + baseurl + imgfolder + "/safari.gif' alt='Safari'/></a>";
	msg 			+= "<a href ='http://www.google.com/chrome' title='Google Chrome'><img src='" + baseurl + imgfolder + "/chrome.gif' alt='Google Chrome'/></a>";
	msg	 			+= "<a href ='http://www.microsoft.com/windows/downloads/ie/getitnow.mspx' title='IE 7'><img src='" + baseurl + imgfolder + "/ie7.gif' alt='IE 7'/></a>";
	msg				+= "</span>";
	msg				+= "</div>";
	
	if(jQuery.browser.msie && version == 6)
	{
		jQuery("body").html(msg);

	}
	
}
);