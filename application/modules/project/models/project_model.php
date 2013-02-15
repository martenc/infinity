<?php

class Project_model extends CI_Model {

  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function save($projectValues) {
    $data = array(
      'name' => $projectValues['project_name'],
      'client' => $projectValues['project_client'],
      'uid' => '2',
    );

    return $this->db->insert('project', $data);
  }

  /**
   * @param associative array $projectParams
   * @return result array
   */
  public function get_project($projectParams = array()) {

    if ($projectParams) {
      $query = $this->db->get('project');
    }
    else {
      $query = $this->db->get_where('project', $projectParams);
    }
    $projects = array();
    foreach ($query->result() as $row) {
      $projects[$row->pid] = $row;
    }
    return $projects;
  }

}