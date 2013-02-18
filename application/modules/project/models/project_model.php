<?php

class Project_model extends CI_Model {

  // calling the constructor
  public function __construct() {
    parent::__construct();
  }

  public function save($projectValues) {
    $data = array(
      'name' => $projectValues['project_name'],
      'client' => $projectValues['project_client'],
      'uid' => '2',
    );

    $this->db->insert('project', $data);
    $last_insert_id= $this->db->insert_id();
    return $this->get_project();
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
    return $query->result();
  }

}