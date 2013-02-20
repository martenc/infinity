<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model {
  private $tablename = 'clients';

  public function __construct() {
    parent::__construct();
  }

  public function get_clients($cid = null) {
    $this->db
      ->select()
      ->from($this->tablename);

    if ($cid) {
      $this->db->where('cid', $cid);
    }

    $query = $this->db->get();
    return $query->result_array();
  }
}