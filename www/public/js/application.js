
$(document).ready(function(){
	setTime();
	setInterval(setTime, 1000);
});

var monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
	  "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
	];

var weekDayNames = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

function setTime()
{
	var now = new Date();
	var outDate = weekDayNames[now.getDay()] + " " + now.getDate() + " " + monthNames[now.getMonth()] + " " + now.getFullYear();
	var outHour = now.getHours();
	var outStr = "";
	
	if(outHour<10){outStr = "0";}
	outStr += outHour + ":";
	
	var outMin = now.getMinutes();
	if(outMin<10){outStr += "0";}
	outStr += outMin;
	
	$("span.time").text(outStr);
	$("span.date").text(outDate);	
}

function startLoader(dashboardId) {
    $(".dashboard" + dashboardId + " .dimmer").addClass("active");
}

function stopLoader(dashboardId) {
    $(".dashboard" + dashboardId + " .dimmer").removeClass("active");
}