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
    $this->db
      ->select('*, c.name as clientname, p.name as projectname')
      ->from('project p');

    $this->db->join('clients c', 'c.cid=p.client');
    $query = $this->db->get();

    return $query->result();
  }

  /**
   * This function will take the data including the project id
   * and run and update statement.
   * @param $data
   */
  public function edit_project($data) {
    $this->db->where('pid', $data['pid']);
    $this->db->update('project', $data);
    return true;
  }

}