<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

  public function __construct() {

    parent::__construct();
  }

  // everyone will be redirected to project list view.
  public function index() {
    redirect('project/view');
  }

  // project list page
  public function view() {
    $data['view']['layout'] = 'project';
    $data['view']['data']['project'] = '';
    $this->load->view('layouts/page_view', $data);
  }


  public function create() {
    $data['view']['layout'] = 'createproject';
    $data['view']['data']['project'] = '';
    $this->load->view('layouts/page_view', $data);
  }

  public function save() {
    $data['view']['layout'] = 'project';
    $data['view']['data']['project'] = '';
    $this->load->view('layouts/page_view', $data);
  }

}