<?php 

class Timesheet_model extends CI_Model {

	// calling the constructor
	public function __construct() {
		parent::__construct();

	}

	public function savedata($timesheetValues) {
    $startDate = strtotime($timesheetValues['createddate'] . ' ' . $timesheetValues['createdTime']);
    $endDate = strtotime($timesheetValues['createddate'] . ' ' . $timesheetValues['endedTime']);
    $total =  $endDate - $startDate;
    $data = array(
      'pid' => $timesheetValues['pid'],
      'uid' => $this->session->userdata('uid'),
      'description' => $timesheetValues['description'],
      'created' => $startDate,
      'ended' => $endDate,
      'total' => $total,
    );
    $this->db->insert('timesheet', $data);
    $tid = $this->db->insert_id();
    $query = $this->getitemdata($tid);
    $result['insert'] = $query[0];
    return $result;
	}

  /**
   * @param associative array with key and value $tsParams
   * @return object of timesheets
   */
  public function gettsdata($tsParams = null) {
    $this->db->select('tid')->from('timesheet')->order_by('created desc');
    if ($tsParams) {
      foreach ($tsParams as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $query = $this->db->get();
    $result = array();
    foreach ($query->result() as $key => $value) {
      $result[] = $value->tid;
    }
    return $result;
  }

  public function getitemdata($tids) {
    if (!isset($tids)) {
      return '';
    }
    if(!is_array($tids)) {
      $tids = array($tids);
    }

    $this->db->select('project.name as projectName, clients.name as clientName, timesheet.*');
    $this->db->from('timesheet');
    $this->db->join('project', 'project.pid = timesheet.pid');
    $this->db->join('clients', 'clients.cid = project.client');
    $this->db->where_in('tid', $tids);
    $query = $this->db->get();
    $result = array();
    foreach ($query->result() as $key => $value) {
      $result[$key] = $value;
      $result[$key]->date = date('d-m-Y', $value->created);
      $result[$key]->showData = $this->load->view('timesheetListItem', array('item' => $value), true);
    }
    return $result;
  }

}