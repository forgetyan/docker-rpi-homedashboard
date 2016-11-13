<?php
require '../application/viewmodel/home.php';
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
    	$model = new HomeViewModel();
    	$model->menuItems = $this->model->getAllMenu();
        
        // Search all dashboard items
        $dashboardList = $this->model->getAllDashboardItems();;
        
        // Set all dashboard item in the proper menu viewmodel
        foreach($dashboardList as $dashboardInstance)
        {
            foreach($model->menuItems as $menuInstance)
            {
                if($menuInstance->id == $dashboardInstance->menuId)
                {
                    $dashboardInstance->sizeMobileText = $this->convertNumberToText($dashboardInstance->sizeMobile);
                    $dashboardInstance->sizeComputerText = $this->convertNumberToText($dashboardInstance->sizeComputer);
                    $dashboardInstance->controllerName = $this->model->getControllerName($dashboardInstance->type);
                    if(!isset($menuInstance->dashboards)){
                        $menuInstance->dashboards = array();
                    }
                    $menuInstance->dashboards[$dashboardInstance->id] = $dashboardInstance;
                }
            }
        }
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
    
    var $numberConvertion = array("zero", "one", "two", "tree", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve");
    public function convertNumberToText($number)
    {
        return $this->numberConvertion[$number];
    }
}
