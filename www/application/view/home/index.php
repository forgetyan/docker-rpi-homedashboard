<div class="ui four padded column grid">
    <?php 
    if (isset($model) && isset ($model->menuItems)) {
        if(isset($model->menuItems[0]->dashboards)) {
            $includedResourceFile = array();
            foreach($model->menuItems[0]->dashboards as $dashboardInstance) {
                ?>
                <div id="dashboard_<?php echo $dashboardInstance->id?>" class="<?php echo $dashboardInstance->sizeMobileText?> wide mobile <?php echo $dashboardInstance->sizeComputerText?> wide computer column">
                    <div class="<?php echo $dashboardInstance->color?> inverted ui segment center dashboard<?php echo $dashboardInstance->id?>">
                        <div class="ui dimmer">
                          <!--div class="ui text loader">Chargement</div-->
                          <div class="ui loader"></div>
                        </div>
                        <?php 
                        $controllerArray = explode('/', $dashboardInstance->controllerName);
                        
                        if (file_exists(APP . 'controller/' . $controllerArray[0] . '.php')) {
                            require_once APP . 'controller/' . $controllerArray[0] . '.php';
                        }
                        $controller = new $controllerArray[0]();
                        call_user_func_array(array($controller, $controllerArray[1]), array($dashboardInstance->id));
                        //$controller->{$controllerArray[1]}();
                        
                        if (file_exists(ROOT . 'public/js/dashboard/' . $controllerArray[0] . '.js')) {
                            if(!array_key_exists($controllerArray[0] . '/js', $includedResourceFile)){
                                $includedResourceFile[$controllerArray[0] . '/js'] = 1;
                                echo '<script type="text/javascript" src="/js/dashboard/' . $controllerArray[0] . '.js"></script>';
                            }
                        }
                        if (file_exists(ROOT . 'public/css/dashboard/' . $controllerArray[0] . '.css')) {
                            
                            if(!array_key_exists($controllerArray[0] . '/css', $includedResourceFile)){
                                $includedResourceFile[$controllerArray[0] . '/css'] = 1;
                                echo '<link rel="stylesheet" type="text/css" href="/css/dashboard/' . $controllerArray[0] . '.css"/>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
    

    <!--
    <div class="eight wide mobile four wide computer column">
        <div class="green inverted ui segment center">
            <h1>Glycémie Jérémy</h1>
                <div class="ui inverted statistic">
                    <div class="value">
                        8.5
                    </div>
                    <div class="label">
                        mmol/L
                    </div>
		</div>
		<span style="font-size:60px">↘︎</span>
    </div>
  </div>
  <div class="eight wide mobile four wide computer column">
    <div class="yellow inverted ui segment">
        <iframe title="Environment Canada Weather" width="350px" height="191px" src="//weather.gc.ca/wxlink/wxlink.html?cityCode=qc-13&amp;lang=f" allowtransparency="true" frameborder="0"></iframe>
    </div>
  </div>
  <div class="eight wide mobile four wide computer column">
    <div class="blue inverted ui segment">
    </div>
  </div>
  <div class="eight wide mobile four wide computer column">
    <div class="orange inverted ui segment center">
  		<h1>Glycémie Maxime</h1>
  		<div class="ui inverted statistic">
		  <div class="value">
		    5.3
		  </div>
		  <div class="label">
		    mmol/L
		  </div>
		</div>
		<span style="font-size:60px">→︎</span>
    </div>
  </div>
  <div class="eight wide mobile four wide computer column">
    <div class="pink inverted ui segment">Content</div>
  </div>
  <div class="eight wide mobile four wide computer column">
    <div class="teal inverted ui segment">Content</div>
  </div>
</div>
<!-- <div class="ui equal width center aligned padded grid">
  <div class="row">
    <div class="olive column">
      Olive
    </div>
    <div class="black column">
      Black
    </div>
  </div>
  <div class="row" style="background-color: #869D05;color: #FFFFFF;">
    <div class="column">Custom Row</div>
  </div>
  <div class="row">
    <div class="black column">
      Black
    </div>
    <div class="olive column">
      Olive
    </div>
  </div>
</div> -->

<!--div class="ui page grid">
        <div class="three column row">
            <div class="column"> Horizontal section, column 1</div>
            <div class="column"> Horizontal section, column 2</div>
            <div class="column"> Horizontal section, column 3</div>
        </div>
        <div class="two column row">
            <div class="column"> 
                <div class="ui segment">
                    <div class="ui vertical segment">
                        <p>Left column, row 1</p>
                    </div>
                    <div class="ui vertical segment">
                        <p>Left column, row 2</p>
                    </div>
                    <div class="ui vertical segment">
                        <p>Left column, row 3</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="row"> Right column, row 1</div>
                <div class="row"> Right column, row 2</div>
            </div>
        </div>
    </div-->