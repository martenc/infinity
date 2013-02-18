<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  // everyone will be redirected to project list view.
  public function index() {
    redirect('project/view');
  }

  public function getjson() {
    $this->load->model('project_model');
    $projects = $this->project_model->get_project();
    print json_encode($projects);
  }

  // project list page
  public function view() {
    $data['view']['layout'] = 'projectview';
    $data['view']['data']['project'] = '';
    $this->load->view('layouts/page_view', $data);
  }


  public function create() {
    $data['scripts'][] = 'project/create.js';
    $data['view']['layout'] = 'createproject';
    $data['view']['data']['project'] = '';
    $this->load->view('layouts/page_view', $data);
  }

  public function createpopup() {
    $this->load->view('createproject');
  }

  public function save() {
    if ($_POST) {
      // loading the model
      $this->load->model('project_model');
      print json_encode($this->project_model->save($_POST));
    }
    else {
      redirect('project/view');
    }
  }


  public function savejson() {
    if ($_POST) {
      // loading the model
      $this->load->model('project_model');
      print json_encode($this->project_model->save($_POST));
    }
    else {
      redirect('project/view');
    }
  }

}