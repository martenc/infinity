<?php 

class Timesheet_model extends CI_Model {

	// calling the constructor
	public function __construct() {
		parent::__construct();
    $this->load->database();
	}

	public function savedata($timesheetValues) {
    $date = strtotime('now');
    $data = array(
      'pid' => 1,
      'uid' => '1',
      'description' => $timesheetValues['description'],
      'created' => $date,
      'ended' => $date,
      'total' => 20,
    );
    $inserted = $this->db->insert('timesheet', $data);
    $tid = $this->db->insert_id();

    $query = $this->db->get_where('timesheet', array('tid' => $tid))->result();
    $query[0]->date = date('d-m-Y',$date);
    $result['insert'][$query[0]->tid] = $query[0];
    return $result;
	}


  public function gettsdata($tsParams = null) {
    if ($tsParams) {
      $query = $this->db->get('timesheet');
    }
    else {
      $query = $this->db->get_where('timesheet', $tsParams);
    }
    return $query->result();
  }

}