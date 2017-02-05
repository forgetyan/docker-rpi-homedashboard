<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!-- Begin WeatherLink Fragment -->
<div class="ui embed" data-url="//weather.gc.ca/wxlink/wxlink.html?cityCode=qc-13&amp;lang=f">
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ui.embed').embed();
        //$('#dashboard_<?php echo $model->dashboardId?> .ui.embed').embed();
    });
</script>


<!-- End WeatherLink Fragment -->
