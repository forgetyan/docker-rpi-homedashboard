/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//alert("test");
class Nightscout {
    static update(dashboardId) {
        //startLoader(dashboardId);
        //setTimeout(function(){stopLoader(dashboardId)}, 100);
        //$(".dashboard" + dashboardId + " .value").html(dashboardId);
        $.ajax({
            url: "/nightscout/update/" + dashboardId,
            dataType: 'json',
            success: function (response)
            {
                $("#dashboard_" + dashboardId + " div.value span.glyc").html(response['sgv']);
                $("#dashboard_" + dashboardId + " span.minago").html(response['minago']);
                var directionText = '';
                // <!--→↓↑↗↘-->
                switch(response['direction'])
                {
                    case "Flat":
                        directionText = '→';
                        break;
                    case "FortyFiveDown":
                        directionText = '↘';
                        break;
                    case "FortyFiveUp":
                        directionText = '↗';
                        break;
                    case "SingleUp":
                        directionText = '↑';
                        break;
                    case "SingleDown":
                        directionText = '↓';
                        break;
                    case "DoubleDown":
                        directionText = '↓↓';
                        break;
                    case "DoubleUp":
                        directionText = '↑↑';
                        break;
                }
                var percentBattery = response['percentbattery'];
                
                var batteryStateClass = "";
                if (percentBattery < 20)
                {
                     batteryStateClass = "empty";
                }
                else if(percentBattery < 40)
                {
                    batteryStateClass = "low";
                }
                else if(percentBattery < 60)
                {
                    batteryStateClass = "medium";
                }
                else if(percentBattery < 80)
                {
                    batteryStateClass = "high";
                }
                else if(percentBattery <= 100)
                {
                    batteryStateClass = "full";
                }
                $("#dashboard_" + dashboardId + " i.bat").attr("class", "icon bat battery " + batteryStateClass);
                $("#dashboard_" + dashboardId + " span.percentbattery").html(response['percentbattery']);
                $("#dashboard_" + dashboardId + " span.nightscout_direction").html(directionText);
                var tendency = response['tendency'];
                if(tendency >= 0)
                {
                    tendency = "+" + tendency;
                }
                $("#dashboard_" + dashboardId + " span.tendency").html(tendency);
                //console.log(response);
            }
        }).done(function(msg) {
            console.log(msg );
        }).error(function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError );
        });
    }
}