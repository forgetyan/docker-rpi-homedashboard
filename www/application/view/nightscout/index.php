<h1><?php echo $model->title?></h1>
<a class="ui red right corner label">
    <i class="icon help bat"></i>
</a>
<span class="ui red right ribbon label">
    <i class="time icon"></i> <span class="minago"></span><div class="detail">mins ago</div>
</span><br/>
<div class="ui two column grid">
    <div class="column">
        
        
        <div class="ui inverted statistic">
            <div class="value">
                <span class="glyc" style="float:left"></span>
                &nbsp;
                <span class="nightscout_direction" style="float:left"></span><!--→↓↑↗↘-->
            </div>
            
            <div class="label" style="text-align: left; margin-left:5px">
                <span class="tendency">&nbsp;</span>
                mmol/L
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() { Nightscout.update(<?php echo $model->dashboardId?>)}, 10000);
        Nightscout.update(<?php echo $model->dashboardId?>);
    });
</script>    
