<h1><?php echo $model->title?></h1>
<span class="ui red right ribbon label">
    <i class="time icon"></i> <span class="minago"></span><div class="detail">mins ago</div>
</span>
<div class="ui two column grid">
    <div class="column">
        <div class="ui inverted statistic">
            <div class="value">
                &nbsp;
            </div>
            <div class="label">
                mmol/L
            </div>
        </div>
        <span class="nightscout_direction">↘</span>→↓↑
    </div>
    <div class="column">
        
        TEST
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() { Nightscout.update(<?php echo $model->dashboardId?>)}, 10000);
        Nightscout.update(<?php echo $model->dashboardId?>);
    });
</script>    
