<?php
require_once 'dashboardBase.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NightscoutViewModel extends DashboardBaseViewModel implements JsonSerializable
{
    public $sgv = 0;
    public $tendency = 0;
    public $direction = 0;
    public $directiontext = 0;
    public $minago = 0;
    public $percentbattery = 0;
    
    public function jsonSerialize()
    {
        return [
            'sgv' => $this->sgv,
            'tendency' => $this->tendency,
            'direction' => $this->direction,
            'directiontext' => $this->directiontext,
            'minago' => $this->minago,
            'percentbattery' => $this->percentbattery
        ];
    }
}