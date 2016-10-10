$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

});
$(document).ready(function(){
	//alert("test");
	setTime();
	setInterval(setTime, 1000);
});

var monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
	  "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
	];

var weekDayNames = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

function setTime()
{
	//console.log($("span.time"));
	var now = new Date();
	var outDate = weekDayNames[now.getDay()] + " " + now.getDate() + " " + monthNames[now.getMonth()] + " " + now.getFullYear();
	var outHour = now.getHours();
	var outStr = "";
	
	if(outHour<10){outStr = "0";}
	outStr += outHour + ":";
	
	var outMin = now.getMinutes();
	if(outMin<10){outStr += "0";}
	outStr += outMin;
	
	//+':'+now.getMinutes()+':'+now.getSeconds();
	$("span.time").text(outStr);
	$("span.date").text(outDate);
	
}