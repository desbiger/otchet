DevExpress.devices.current({ platform: "generic" });

$(function() {	
	var code = $("script").last().text();	

	var changeTheme = function (theme) {
		$("." + theme + "-theme").addClass("active");		
		DevExpress.viz.core.currentTheme("desktop",theme);
		$("#container").empty();
		var container = $("#container").remove();
		container.appendTo(".pane");
		eval(code);
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