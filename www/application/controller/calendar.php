<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Calendar extends Controller
{
    public function index($dashboardId)
    {
        $dashboardItem = $this->model->getDashboardItem($dashboardId);
        $model = new DashboardBaseViewModel();
        $model->dashboardId = $dashboardId;
        
        global $client; // Google client
        $calendarService = new Google_Service_Calendar($client);
        
        $optParams = array(
          'maxResults' => 30,
        );
        
        $calendarList = $calendarService->calendarList->listCalendarList($optParams);
        foreach ($calendarList->getItems() as $calendarListEntry) {
            echo $calendarListEntry->id . '<br>';
            echo $calendarListEntry->getSummary() . '<br>';
        }
        $calendarId = 'primary';
        $dateend = new DateTime(date('c'));
        $dateend->add(new DateInterval('P10D'));
        $optParams = array(
          'maxResults' => 30,
          'orderBy' => 'startTime',
          'singleEvents' => TRUE,
          'timeMin' => date('c'),
          'timeMax' => $dateend->format('c'),
        );
        
        
        $results = $calendarService->events->listEvents($calendarId, $optParams);
        
        if (count($results->getItems()) == 0) {
            print "No upcoming events found.\n";
        } else {
            print "<br>Upcoming events:<br>\n";
            foreach ($results->getItems() as $event) {
              $start = $event->start->dateTime;
              if (empty($start)) {
                $start = $event->start->date;
              }
              printf("%s (%s)\n<br>", $event->getSummary(), $start);
            }
        }

/*
        $service = new Google_Service_Books($client);
        $optParams = array('filter' => 'free-ebooks');
        $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
        */
        //var_dump($results);
        /*foreach ($results as $item) {
          echo $item['volumeInfo']['title'], "<br /> \n";
        }*/

        require APP . 'view/calendar/index.php';
    }
}