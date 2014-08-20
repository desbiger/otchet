DevExpress.devices.current({ platform: "generic" });

$(function() {	
	var container = $("<div id='chartContainer' style='height: 440px; width: 100%;'></div>"),
		code = $("script").last().text();	

	var changeTheme = function (theme) {
		$("." + theme + "-theme").addClass("active");		
		DevExpress.ui.themes.current("generic." + theme);
	}

	$(".dark-theme").click(function() {
		$(".light-theme").removeClass("active");
		$(".pane").addClass("dark");
		changeTheme("dark");
	});

	$(".light-theme").click(function() {
		$(".dark-theme").removeClass("active");
		$(".pane").removeClass("dark");
		changeTheme("light")
	});
});