<?php 

class Timesheet_model extends CI_Model {

	// calling the constructor
	public function __construct() {
		parent::__construct();
	}

	public function savedata($timesheetValues) {
    $startDate = strtotime($timesheetValues['createddate'] . ' ' . $timesheetValues['createdTime']);
    $endDate = strtotime($timesheetValues['createddate'] . ' ' . $timesheetValues['endedTime']);
    $data = array(
      'pid' => $timesheetValues['pid'],
      'uid' => $this->session->userdata('uid'),
      'description' => $timesheetValues['description'],
      'created' => $startDate,
      'ended' => $endDate,
      'total' => 20,
    );
    $this->db->insert('timesheet', $data);
    $tid = $this->db->insert_id();
    $params = array('tid' => $tid);

    $query = $this->gettsdata($params);
    $query[0]->date = date('d-m-Y', $startDate);
    $result['insert'] = $query[0];
    return $result;
	}

  /**
   * @param associative array with key and value $tsParams
   * @return object of timesheets
   */
  public function gettsdata($tsParams = null) {
    $this->db->select();
    $this->db->from('timesheet');

    if ($tsParams) {
      foreach ($tsParams as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $query = $this->db->get();
    return $query->result();
  }

}