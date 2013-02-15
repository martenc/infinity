<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet extends CI_Controller {

  public function __construct() {

    parent::__construct();


  }

  // everyone will be redirected to timesheet track page.
  public function index() {
    redirect('timesheet/track');
  }

  // timesheet track page
  public function track() {
    //TODO: pass timesheet js to view variable
    $data['view']['layout'] = 'track';
    $data['view']['data']['timesheet']['form']['projects'] = array('' => '', '1' => 'tri', '2'=> 'test');
    $this->load->view('layouts/page_view', $data);
  }


  //ajax callback to save timesheets
  public function save() {
    if (isset($_POST)) {
      // loading the model
      $this->load->model('timesheet_model');
      $this->timesheet_model->savedata($_POST);
    }
    else {
      redirect('timesheet/track');
    }


  }

  
}