<?php 

class Timesheet_model extends CI_Model {

	// calling the constructor
	public function __construct() {
		parent::__construct();
    $this->load->database();
	}

	public function savedata($timesheetValues) {
    $data = array(
      'pid' => $timesheetValues['timesheet_project'],
      'uid' => '1',
      'description' => $timesheetValues['timesheet_description'],
      'created' => $timesheetValues['timesheet_started'],
      'ended' => $timesheetValues['timesheet_ended'],
      'total' => $timesheetValues['timesheet_duration'],
    );

    return $this->db->insert('timesheet', $data);
	}

}