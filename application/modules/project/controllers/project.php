<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

  public function __construct() {
    parent::__construct();
    auth_user();
  }

  // everyone will be redirected to project list view.
  public function index() {
    redirect('project/view');
  }

  // project list page
  public function view() {
    $data['scripts'][] = 'vendor/angular.min.js';
    $data['scripts'][] = 'project/module.js';
    $data['scripts'][] = 'client/module.js';
    $data['scripts'][] = 'project/app.js';
    
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

//  public function save() {
//    if ($_POST) {
//      // loading the model
//      $this->load->model('project_model');
//      print json_encode($this->project_model->save($_POST));
//    }
//    else {
//      redirect('project/view');
//    }
//  }

  public function getjson() {
    $this->load->model('project_model');
    $projects = $this->project_model->get_project();
    print json_encode($projects);
  }

  /**
   * This function is to save a new project. Angular is sending the JSON
   * and the POST data is passed to model.
   */
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

  /**
   *
   */
  public function editjson() {
    if(check_if_post()) {
      $this->load->model('project_model');
      $data['pid'] = $this->input->post('pid');
      $data['name'] = $this->input->post('name');
      $edit = $this->project_model->edit_project($data);
      if ($edit) {
        $projects = $this->project_model->get_project();
        print json_encode($projects);
      }
      else
        print 'Some error was encountered, project unchanged.';
    }
    else {
      redirect('project/view');
    }
  }

  // this is the view file for the listing of views
  public function viewlist() {
    $this->load->view('project/project_list_partial');
  }

  // this is the view file for the edit part of project
  public function editproject() {
    $this->load->view('project/project_edit_view');
  }

}