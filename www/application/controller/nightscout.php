<?php
require '../application/viewmodel/nightscout.php';
require '../application/model/nightscoutparameter.php';
/**
 * Class Nightscout
* This is the nightscout controller class.
*
* Please note:
* Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
* This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
*
*/
class Nightscout extends Controller
{
    //var $includeJavascript = true;
    public function index($dashboardId)
    {
        $dashboardItem = $this->model->getDashboardItem($dashboardId);
        $model = new NightscoutViewModel();
        $model->dashboardId = $dashboardId;
        $model->title = $dashboardItem->title;
        // load views
        require APP . 'view/nightscout/index.php';
    }
    
    public function update($dashboardId)
    {
        $dashboardItem = $this->model->getDashboardItem($dashboardId);
        $decode = json_decode($dashboardItem->configuration, true);
        $parameters = new NightscoutParameter($decode["siteUrl"]);
        // Call nightscout website
        $nightscoutDataRaw = file_get_contents('http:'. $decode["siteUrl"] . '/api/v1/entries/sgv.json');
        $nightscoutData = json_decode($nightscoutDataRaw, true);
        $viewModel = new NightscoutViewModel();
        $viewModel->sgv = round($nightscoutData[0]['sgv'] / 18, 1);
        //$viewModel->minago = (getdate() - $nightscoutData[0]['date']) / 60;
        $viewModel->minago = round((time() - strtotime($nightscoutData[0]['dateString'])) / 60);
        //var_dump($nightscoutData);
        echo json_encode($viewModel->jsonSerialize());
    }
}