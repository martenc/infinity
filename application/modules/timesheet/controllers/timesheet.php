<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class timesheet extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  // everyone will be redirected to profile.
  public function index() {
    redirect('timesheet/track');
  }

  // timesheet track page
  public function track() {
    $data['view']['layout'] = 'track';
    $data['view']['data']['content'] = array(1,2,3);
    $this->load->view('layouts/page_view', $data);
  }

  
}