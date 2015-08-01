$(document).ready(function(){
	$(".nav-button").click(function(){
		$("nav[role=primary]").slideToggle();
		$(".login_form ").slideUp();
	});
});


$(document).ready(function(){
	$(".login-button").click(function(){
		$(".login_form ").slideToggle();
	});
});


$(document).ready(function(){
	$("#showpcontest").click(function(){
		$("#pcontestform").slideToggle("slow");
		$("#gcontestform").slideUp("slow");
	});
	$("#showgcontest").click(function(){
		$("#gcontestform").slideToggle("slow");
		$("#pcontestform").slideUp("slow");
	});
});


$(document).ready(function(){
	$("#NFS-MW").click(function(){
		$(".GAME").hide();
		$("#NFS").slideToggle("slow");
	});
	$("#FIFA14").click(function(){
		$(".GAME").hide();
		$("#FIFA").slideToggle("slow");
	});
	$("#COD-MW").click(function(){
		$(".GAME").hide();
		$("#COD").slideToggle("slow");
	});
});


$(document).ready(function(){
	$(".archiveButton").click(function(){
		$(".floatingPanel").fadeIn();
	});
	$(".cancelButton").click(function(){
		$(".floatingPanel").fadeOut();
	});
});

$(document).ready(function(){
	$(".warning").delay(1000).fadeOut("slow");
	$(".success").delay(1000).fadeOut("slow");
	$(".gconteststatus").click(function(){
		$(".gamelist").slideToggle();
	});
});


function iframeLoaded() {
    var iFrameID = document.getElementById('idIframe');
    if(iFrameID) {
	    iFrameID.height = "";
	    iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
	}
}