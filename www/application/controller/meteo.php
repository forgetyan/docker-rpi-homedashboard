<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Meteo extends Controller
{
	public function index($dashboardId)
	{
            $dashboardItem = $this->model->getDashboardItem($dashboardId);
            $model = new DashboardBaseViewModel();
            $model->dashboardId = $dashboardId;
            // load views
            require APP . 'view/meteo/index.php';
	}
}