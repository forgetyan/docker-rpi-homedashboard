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
        $nightscoutDataRaw = file_get_contents('http:'. $decode["siteUrl"] . '/api/v1/entries/sgv.json?count=3');
        $nightscoutData = json_decode($nightscoutDataRaw, true);
        $nightscoutDeviceStatusRaw = file_get_contents('http:'. $decode["siteUrl"] . '/api/v1/devicestatus/?count=1');
        $nightscoutDeviceStatus = json_decode($nightscoutDeviceStatusRaw, true);
        $viewModel = new NightscoutViewModel();
        $firstData = $nightscoutData[0];
        $secondData = $nightscoutData[1];
        // If there is a duplicate, get next value
        if ($nightscoutData[0]['date'] == $nightscoutData[1]['date']){
            $secondData = $nightscoutData[2];
        }
        $sgv1 = round($firstData['sgv'] / 18, 1);
        $sgv2 = round($secondData['sgv'] / 18, 1);
        $minago1 = round((time() - strtotime($firstData['dateString'])) / 60);
        $minago2 = round((time() - strtotime($secondData['dateString'])) / 60);
        $datediff = $minago2 - $minago1;
        $viewModel->sgv = $sgv1;
        $viewModel->direction = $firstData['direction'];
        $viewModel->tendency = round(($sgv1 - $sgv2) * 5 / $datediff, 1);
        //$viewModel->minago = (getdate() - $nightscoutData[0]['date']) / 60;
        $viewModel->minago = $minago1;
        $viewModel->percentbattery = $nightscoutDeviceStatus[0]['uploaderBattery'];
        //var_dump($nightscoutData);
        echo json_encode($viewModel->jsonSerialize());
    }
}