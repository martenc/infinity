<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet extends CI_Controller {

  public function __construct() {
    parent::__construct();
    auth_user(); // this section is authentication based
  }

  // everyone will be redirected to timesheet track page.
  public function index() {
    redirect('timesheet/track');
  }

  // timesheet track page
  public function track() {

    $data['scripts'][] = 'vendor/angular.min.js';
    $data['scripts'][] = 'vendor/ui-bootstrap-tpls-0.1.0.min.js';
    $data['scripts'][] = 'vendor/angular-ui.js';
    $data['scripts'][] = 'vendor/jquery-ui-1.10.0.custom.min.js';

    $data['stylesheets'][] = 'jquery-ui-modified.css';
    //$data['stylesheets'][] = 'bootstrap-timepicker.css';


    $data['scripts'][] = 'timesheet/timesheet.js';

    $data['scripts'][] = 'vendor/bootstrap-timepicker.js';
    //$data['scripts'][] = 'timesheet/timepicker.js';

    $data['view']['layout'] = 'track';
    $this->load->model('project/project_model');
    $projects_values = $this->project_model->get_project();
    $projects[] = '';
    foreach($projects_values as $pkey => $pvalue) {
      $projects[$pvalue->pid] = $pvalue->name;
    }
    $data['view']['data']['timesheet']['form']['projects'] = $projects;
    $this->load->view('layouts/page_view', $data);
  }


  //ajax callback to save timesheets
  public function save() {
    if ($_POST) {
      // loading the model
      $this->load->model('timesheet_model');
      $this->timesheet_model->savedata($_POST);
    }
    else {
      redirect('timesheet/track');
    }
  }

  public function savejson() {
    if ($_POST) {
      // loading the model
      $this->load->model('timesheet_model');
      print json_encode($this->timesheet_model->savedata($_POST));
    }
    else {
      redirect('timesheet/track');
    }
  }


  public function gettsjson() {
    $this->load->model('timesheet_model');
    $uid = $this->session->userdata('uid');
    $tsParams['uid'] = $uid;
    $tsParams['created >='] = strtotime('-7 days');
    $timesheets = $this->timesheet_model->gettsdata($tsParams);

    //this will return dates for group by
    $dates = array();
    for ($i = 0; $i < 7; $i++) {
      $tempDate = date('d-m-Y', strtotime('-' . $i . ' days'));
      $dates[$tempDate]->date = $tempDate;
      //to check if date has data used in ng-show
      $dates[$tempDate]->flag = 0;
    }


    foreach ($timesheets as $key => $value) {
      //convert the date in desired format
      $valueDate = date('d-m-Y', $value->created);
      //check if date exists or not
      if (array_key_exists($valueDate, $dates)) {
        //to check if date has data used in ng-show
        $dates[$valueDate]->flag = 1;
      }
      $timesheets[$key]->date = $valueDate;
    }

    print json_encode(array('allDates' => $dates, 'timesheets' => $timesheets));
  }

  
}