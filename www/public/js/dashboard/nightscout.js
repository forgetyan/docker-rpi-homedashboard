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
                $("#dashboard_" + dashboardId + " div.value").html(response['sgv']);
                $("#dashboard_" + dashboardId + " span.minago").html(response['minago']);
                console.log(response);
            }
        }).done(function(msg) {
            console.log(msg );
        }).error(function(xhr, ajaxOptions, thrownError) {
            //console.log(thrownError );
        });
    }
}